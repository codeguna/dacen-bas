<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StudyProgram
 *
 * @property $id
 * @property $name
 * @property $short_name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class StudyProgram extends Model
{
    
    static $rules = [
		'name' => 'required',
		'short_name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','short_name'];



}
