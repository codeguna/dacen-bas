<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationalStaffEducation
 *
 * @property $id
 * @property $educational_staff_id
 * @property $level_id
 * @property $study_program_id
 * @property $university_id
 * @property $knowledge_id
 * @property $certificate
 * @property $created_at
 * @property $updated_at
 *
 * @property EducationalStaff $educationalStaff
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EducationalStaffEducation extends Model
{
    
    static $rules = [
		'educational_staff_id' => 'required',
		'level_id' => 'required',
		'study_program_id' => 'required',
		'university_id' => 'required',
		'knowledge_id' => 'required',
		'certificate' => 'required|mimes:pdf,jpg,jpeg|max:2048',
    ];

    protected $perPage = 20;
    protected $table = 'educational_staff_educations';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['educational_staff_id','level_id','study_program_id','university_id','knowledge_id','certificate'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function educationalStaff()
    {
        return $this->belongsTo('App\Models\EducationalStaff');
    }
    public function university()
    {
        return $this->belongsTo('App\Models\University');
    }
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
    public function studyProgram()
    {
        return $this->belongsTo('App\Models\StudyProgram','study_program_id');
    }
    public function knowledge()
    {
        return $this->belongsTo('App\Models\Knowledge');
    }
    

}