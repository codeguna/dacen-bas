<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JobApplicantContact
 *
 * @property $id
 * @property $job_applicant_id
 * @property $type
 * @property $number
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobApplicantContact extends Model
{
    
    static $rules = [
		'type' => 'required',
		'number' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['job_applicant_id','type','number','email'];



}
