<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationalStaffCertificate
 *
 * @property $id
 * @property $educational_staff_id
 * @property $certificate_types_id
 * @property $certificate_date
 * @property $note
 * @property $certificate_attachment
 * @property $created_at
 * @property $updated_at
 *
 * @property EducationalStaff $educationalStaff
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EducationalStaffCertificate extends Model
{
    
    static $rules = [
		'educational_staff_id' => 'required',
		'certificate_types_id' => 'required',
		'certificate_date' => 'required',
		'note' => 'required',
		'certificate_attachment' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'educational_staff_certificates';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['educational_staff_id','certificate_types_id','certificate_date','note','certificate_attachment'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function educationalStaff()
    {
        return $this->belongsTo('App\Models\EducationalStaff');
    }
    public function certificateType()
    {
        return $this->belongsTo('App\Models\CertificateType','certificate_types_id');
    }
    

}