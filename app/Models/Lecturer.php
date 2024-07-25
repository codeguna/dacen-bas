<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lecturer
 *
 * @property $id
 * @property $nidn
 * @property $name
 * @property $homebase_id
 * @property $appointment_date
 * @property $status
 * @property $id_card
 * @property $created_at
 * @property $updated_at
 *
 * @property Inpassing[] $inpassings
 * @property LecturerCertificate[] $lecturerCertificates
 * @property LecturerEducation[] $lecturerEducations
 * @property LecturerFunctionalPosition[] $lecturerFunctionalPositions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lecturer extends Model
{
    
    static $rules = [
		'nidn' => 'required',
		'name' => 'required',
		'homebase_id' => 'required',
		'appointment_date' => 'required',
		'status' => 'required',
		'id_card' => 'mimes:pdf,jpg,jpeg|max:2048',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nidn','name','homebase_id','appointment_date','status','id_card','nip','nuptk'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inpassings()
    {
        return $this->hasMany('App\Models\Inpassing', 'lecturer_id', 'id');
    }
    public function homebases()
    {
        return $this->belongsTo('App\Models\Homebase','homebase_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lecturerCertificates()
    {
        return $this->hasMany('App\Models\LecturerCertificate', 'lecturer_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lecturerEducations()
    {
        return $this->hasMany('App\Models\LecturerEducation');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lecturerFunctionalPositions()
    {
        return $this->hasMany('App\Models\LecturerFunctionalPosition', 'lecturer_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nidn', 'nomor_induk');
    }
    

}