<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LecturerCertificate
 *
 * @property $id
 * @property $lecturer_id
 * @property $certificate_types_id
 * @property $certificate_date
 * @property $note
 * @property $certificate_attachment
 * @property $created_at
 * @property $updated_at
 *
 * @property Lecturer $lecturer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LecturerCertificate extends Model
{
    
    static $rules = [
		'lecturer_id' => 'required',
		'certificate_types_id' => 'required',
		'certificate_date' => 'required',
		'note' => 'required',
		'certificate_attachment' => 'required|mimes:pdf,jpg,jpeg|max:2048',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lecturer_id','certificate_types_id','certificate_date','note','certificate_attachment'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer', 'lecturer_id');
    }

    public function certificateType()
    {
        return $this->belongsTo('App\Models\CertificateType','certificate_types_id');
    }
    

}