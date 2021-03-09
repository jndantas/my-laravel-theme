<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEntryAPIRequest;
use App\Http\Requests\API\EntryAPIRequest;
use App\Http\Requests\API\UpdateEntryAPIRequest;
use App\Models\Entry;
use App\Repositories\EntryRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Response;

/**
 * Class EntryController
 * @package App\Http\Controllers\API
 */

class WalletAPIController extends AppBaseController
{
    /** @var  EntryRepository */
    private $entryRepository;

    public function __construct(EntryRepository $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    public function balance(Request $request){
        $wallet = Auth::user()->wallet;
        $payable = $wallet->payables()->whereDate('date', '<=', Carbon::today())->sum('value');
        $receivable = $wallet->receivables()->whereDate('date', '<=', Carbon::today())->sum('value');
        $date = Carbon::createFromDate($request->input('year'), $request->input('month'), 1)->lastOfMonth();
        $projected_payable = $wallet->payables()
            ->where('date', '<=', $date)
            ->sum('value');
        $projected_receivable = $wallet->receivables()
            ->where('date', '<=', $date)
            ->sum('value');
        $receivable = $receivable / 100;
        $payable = $payable / 100;
        $balance = $receivable - $payable;
        $projected_receivable = $projected_receivable / 100;
        $projected_payable = $projected_payable / 100;
        $projected_balance = $projected_receivable - $projected_payable;
        $response = [
            'receivable' => [
                'value' => $receivable,
                'format_value' => number_format($receivable, '2', ',', '.'),
                'format_projected_value' => number_format($projected_receivable, '2', ',', '.'),
            ],
            'payable' => [
                'value' => $payable,
                'format_value' => number_format($payable, '2', ',', '.'),
                'format_projected_value' => number_format($projected_payable, '2', ',', '.'),
            ],
            'balance' => [
                'value' => abs($balance),
                'format_value' => number_format(abs($balance), '2', ',', '.'),
                'format_projected_value' => number_format(abs($projected_balance), '2', ',', '.'),
                'status' => $balance < 0 ? 'negative' : 'positive',
                'projected_status' => $projected_balance < 0 ? 'negative' : 'positive'
            ],
        ];
        return $this->sendResponse($response, '');
    }

    public function monthBalance(Request $request){
        $input = $request->all();
        $payable = $this->entryRepository
                ->allQuery()
                ->where('type', 'payable')
                ->whereMonth('date', $request->input('month'))
                ->whereYear('date', $request->input('year'))
                ->sum('value') / 100;
        $receivable = $this->entryRepository
                ->allQuery()
                ->where('type', 'receivable')
                ->whereMonth('date', $request->input('month'))
                ->whereYear('date', $request->input('year'))
                ->sum('value') / 100;
        $balance = $receivable - $payable;
        $response = [
            'receivable' => [
                'value' => $receivable,
                'format_value' => number_format($receivable, '2', ',', '.'),
            ],
            'payable' => [
                'value' => $payable,
                'format_value' => number_format($payable, '2', ',', '.'),
            ],
            'balance' => [
                'value' => abs($balance),
                'format_value' => number_format(abs($balance), '2', ',', '.'),
                'status' => $balance < 0 ? 'negative' : 'positive'
            ],
        ];
        return $this->sendResponse($response, '');
    }
}
