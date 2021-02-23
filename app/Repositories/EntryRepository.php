<?php

namespace App\Repositories;

use App\Models\Entry;
use App\Repositories\BaseRepository;

/**
 * Class EntryRepository
 * @package App\Repositories
 * @version February 22, 2021, 11:29 pm -03
*/

class EntryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Entry::class;
    }
}
