<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationalStaff
 *
 * @property $id
 * @property $nip
 * @property $name
 * @property $department_id
 * @property $date_of_entry
 * @property $status
 * @property $id_card
 * @property $created_at
 * @property $updated_at
 *
 * @property EducationalStaffCertificate[] $educationalStaffCertificates
 * @property EducationalStaffEducation[] $educationalStaffEducations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EducationalStaff extends Model
{
    
    static $rules = [
		'nip' => 'required',
		'name' => 'required',
		'department_id' => 'required',
		'date_of_entry' => 'required',
		'status' => 'required',
		'id_card' => 'required|mimes:pdf,jpg,jpeg|max:2048',
    ];

    protected $perPage = 20;
    protected $table = 'educational_staffs';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nip','name','department_id','date_of_entry','status','id_card'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educationalStaffCertificates()
    {
        return $this->hasMany('App\Models\EducationalStaffCertificate', 'educational_staff_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educationalStaffEducations()
    {
        return $this->hasMany('App\Models\EducationalStaffEducation', 'educational_staff_id', 'id');
    }

    public function departmens(){
        return $this->belongsTo('App\Models\Departmen','department_id');
    }
    

}