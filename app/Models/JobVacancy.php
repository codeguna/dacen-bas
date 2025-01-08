<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobVacancy
 *
 * @property $id
 * @property $title
 * @property $department_id
 * @property $gender
 * @property $min_age
 * @property $max_age
 * @property $amount_needed
 * @property $date_start
 * @property $deadline
 * @property $level
 * @property $university
 * @property $major
 * @property $university_base
 * @property $graduation_year
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobVacancy extends Model
{
    
    static $rules = [
		'title' => 'required',
		'department_id' => 'required',
		'gender' => 'required',
		'min_age' => 'required',
		'max_age' => 'required',
		'amount_needed' => 'required',
		'date_start' => 'required',
		'deadline' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','department_id','gender','min_age','max_age','amount_needed','date_start','deadline','user_id'];

	public function department()
    {
        return $this->belongsTo(Departmen::class, 'department_id', 'id');
    }

	public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
