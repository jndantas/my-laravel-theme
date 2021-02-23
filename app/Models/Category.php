<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Category
 * @package App\Models
 * @version February 22, 2021, 11:09 pm -03
 *
 * @property string $name
 * @property string $type
 */
class Category extends BaseModel
{
    public $table = 'categories';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'type' => 'required'
    ];

    public function entries(){
        return $this->hasMany(Entry::class, 'category_id', 'id');
    }
}
