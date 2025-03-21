<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeDevelopment
 *
 * @property $id
 * @property $event_name
 * @property $speaker
 * @property $event_organizer
 * @property $place
 * @property $price
 * @property $event_type
 * @property $start_date
 * @property $end_date
 * @property $created_at
 * @property $updated_at
 *
 * @property EmployeeDevelopmentMember[] $employeeDevelopmentMembers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmployeeDevelopment extends Model
{
    
    static $rules = [
		'event_name' => 'required',
		'speaker' => 'required',
		'event_organizer' => 'required',
		'place' => 'required',
		'price' => 'required',
		'event_type_id' => 'required',
		'start_date' => 'required',
		'end_date' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['event_name','speaker','event_organizer','place','price','event_type_id','start_date','end_date','is_approved'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeDevelopmentMembers()
    {
        return $this->hasOne('App\Models\EmployeeDevelopmentMember', 'employee_developments_id', 'id');
    }
    public function eventTypes()
    {
        return $this->belongsTo('App\Models\EventType', 'event_type_id');
    }
    

}
