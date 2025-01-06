<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JobApplicantAddress
 *
 * @property $id
 * @property $job_applicant_id
 * @property $address
 * @property $village
 * @property $district
 * @property $province
 * @property $city
 * @property $postal_code
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobApplicantAddress extends Model
{
    
    static $rules = [
		'job_applicant_id' => 'required',
		'address' => 'required',
		'village' => 'required',
		'district' => 'required',
		'province' => 'required',
		'city' => 'required',
		'postal_code' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['job_applicant_id','address','village','district','province','city','postal_code'];



}
