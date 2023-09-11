<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LecturerEducation
 *
 * @property $id
 * @property $lecturer_id
 * @property $level_id
 * @property $study_program_id
 * @property $university_id
 * @property $knowledge_id
 * @property $certificate
 * @property $created_at
 * @property $updated_at
 *
 * @property Lecturer $lecturer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LecturerEducation extends Model
{
    
    static $rules = [
		'lecturer_id' => 'required',
		'level_id' => 'required',
		'study_program_id' => 'required',
		'university_id' => 'required',
		'knowledge_id' => 'required',
		'certificate' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'lecturer_educations';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lecturer_id','level_id','study_program_id','university_id','knowledge_id','certificate'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer','lecturer_id');
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
        return $this->belongsTo('App\Models\StudyProgram');
    }
    public function knowledge()
    {
        return $this->belongsTo('App\Models\Knowledge');
    }
    

}