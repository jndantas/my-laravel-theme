<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Entry
 * @package App\Models
 * @version February 22, 2021, 11:29 pm -03
 *
 * @property string $name
 * @property string $description
 * @property number $value
 * @property string $type
 * @property string $status
 * @property integer $category_id
 * @property integer $created_by
 * @property string|\Carbon\Carbon $date
 */
class Wallet extends BaseModel
{
    public $table = 'wallets';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'user_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'user_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'user_id' => 'required',
    ];

    public static $formRequestAttributes = [
        'name' => 'titulo',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function entries(){
        return $this->hasMany(Entry::class, 'wallet_id', 'id');
    }

    public function payables(){
        return $this->entries()->where('type', 'payable');
    }

    public function receivables(){
        return $this->entries()->where('type', 'receivable');
    }

}
