<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LecturerFunctionalPosition
 *
 * @property $id
 * @property $lecturer_id
 * @property $functional_position_id
 * @property $determination_date
 * @property $tmt
 * @property $credit_score
 * @property $functional_position_attachment
 * @property $created_at
 * @property $updated_at
 *
 * @property Lecturer $lecturer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LecturerFunctionalPosition extends Model
{
    
    static $rules = [
		'lecturer_id' => 'required',
		'functional_position_id' => 'required',
		'determination_date' => 'required',
		'tmt' => 'required',
		'credit_score' => 'required',
		'functional_position_attachment' => 'required|mimes:pdf,jpg,jpeg|max:2048',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lecturer_id','functional_position_id','determination_date','tmt','credit_score','functional_position_attachment'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer', 'id', 'lecturer_id');
    }

    public function functionalPosition(){
      return $this->belongsTo('App\Models\FunctionalPosition', 'functional_position_id');
    }
    

}