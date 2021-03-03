<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEntryAPIRequest;
use App\Http\Requests\API\UpdateEntryAPIRequest;
use App\Models\Entry;
use App\Repositories\EntryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Response;

/**
 * Class EntryController
 * @package App\Http\Controllers\API
 */

class EntryAPIController extends AppBaseController
{
    /** @var  EntryRepository */
    private $entryRepository;

    public function __construct(EntryRepository $entryRepo)
    {
        $this->entryRepository = $entryRepo;
    }

    /**
     * Display a listing of the Entry.
     * GET|HEAD /entries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $entries = $this->entryRepository
            ->with('category')
            ->with('user')
            ->orderBy('date', 'desc')
            ->paginate(10);

        return $this->sendResponse($entries->toArray(), 'Entries retrieved successfully');
    }

    /**
     * Store a newly created Entry in storage.
     * POST /entries
     *
     * @param CreateEntryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEntryAPIRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $input['created_by'] = $user->id;
        $input['wallet_id'] = $user->wallet->id;

        $entry = $this->entryRepository->create($input);

        return $this->sendResponse($entry->toArray(), 'Entry saved successfully');
    }

    /**
     * Display the specified Entry.
     * GET|HEAD /entries/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Entry $entry */
        $entry = $this->entryRepository->find($id);

        if (empty($entry)) {
            return $this->sendError('Entry not found');
        }

        return $this->sendResponse($entry->toArray(), 'Entry retrieved successfully');
    }

    /**
     * Update the specified Entry in storage.
     * PUT/PATCH /entries/{id}
     *
     * @param int $id
     * @param UpdateEntryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntryAPIRequest $request)
    {
        $input = $request->all();

        /** @var Entry $entry */
        $entry = $this->entryRepository->find($id);

        if (empty($entry)) {
            return $this->sendError('Entry not found');
        }

        $entry = $this->entryRepository->update($input, $id);

        return $this->sendResponse($entry->toArray(), 'Entry updated successfully');
    }

    /**
     * Remove the specified Entry from storage.
     * DELETE /entries/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Entry $entry */
        $entry = $this->entryRepository->find($id);

        if (empty($entry)) {
            return $this->sendError('Entry not found');
        }

        $entry->delete();

        return $this->sendSuccess('Entry deleted successfully');
    }
}
