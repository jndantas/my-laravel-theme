<?php

namespace App\Models;

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
        'created_by',
        'date'
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
        'value' => 'decimal:2',
        'type' => 'string',
        'status' => 'string',
        'category_id' => 'integer',
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

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
