<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Willingness
 *
 * @property $id
 * @property $user_id
 * @property $valid_start
 * @property $valid_end
 * @property $type
 * @property $monday
 * @property $tuesday
 * @property $wednesday
 * @property $thursday
 * @property $friday
 * @property $saturday
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Willingness extends Model
{
    
    static $rules = [
		'valid_start' => 'required',
		'valid_end' => 'required',
		'type' => 'required',
		'monday' => 'required',
		'tuesday' => 'required',
		'wednesday' => 'required',
		'thursday' => 'required',
		'friday' => 'required',
		'saturday' => 'required',
    ];

    protected $perPage = 20;
	protected $table = 'willingness';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','valid_start','valid_end','type','monday','tuesday','wednesday','thursday','friday','saturday'];



}