<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Holiday
 *
 * @property $id
 * @property $date
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Holiday extends Model
{
    
    static $rules = [
		'date' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','name'];



}
