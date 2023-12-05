<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Willingness
 *
 * @property $id
 * @property $pin
 * @property $start_date
 * @property $end_date
 * @property $day_code
 * @property $time_of_entry
 * @property $time_of_return
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Willingness extends Model
{
    
    static $rules = [
		'pin' => 'required',
		'start_date' => 'required',
		'end_date' => 'required',
		'day_code' => 'required',
		'time_of_entry' => 'required',
		'time_of_return' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'willingness';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pin','start_date','end_date','day_code','time_of_entry','time_of_return'];



}