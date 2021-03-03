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
class Entry extends BaseModel
{
    public $table = 'entries';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description',
        'value',
        'type',
        'status',
        'category_id',
        'wallet_id',
        'created_by',
        'date'
    ];

    protected $appends = [
        'format_value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'value' => 'double:2',
        'type' => 'string',
        'status' => 'string',
        'category_id' => 'integer',
        'wallet_id' => 'integer',
        'created_by' => 'integer',
        'date' => 'date:d/m/Y'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'description' => 'max:1000',
        'value' => 'required',
        'type' => 'required',
        'category_id' => 'required',
        'date' => 'required'
    ];

    public static $formRequestAttributes = [
        'name' => 'referência',
        'value' => 'valor',
        'date' => 'data',
        'category_id' => 'categoria',
    ];

    public function setDateAttribute($value){
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['date'] = $date;
    }

    public function setValueAttribute($value){
        $value = str_replace([',', '.'], '', $value);
        $this->attributes['value'] = $value;
    }

    public function getFormatValueAttribute(){
        return number_format($this->attributes['value'] / 100, '2', ',', '.');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function wallet(){
        return $this->belongsTo(Wallet::class, 'wallet_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
