<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inpassing
 *
 * @property $id
 * @property $lecturer_id
 * @property $rank_id
 * @property $determination_date
 * @property $tmt
 * @property $inpassing_attachment
 * @property $created_at
 * @property $updated_at
 *
 * @property Lecturer $lecturer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inpassing extends Model
{
    
    static $rules = [
		'lecturer_id' => 'required',
		'rank_id' => 'required',
		'determination_date' => 'required',
		'tmt' => 'required',
		'inpassing_attachment' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lecturer_id','rank_id','determination_date','tmt','inpassing_attachment'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer', 'id', 'lecturer_id');
    }

    public function inpassing(){
      return $this->belongsTo('App\Models\FunctionalRank','rank_id');
    }
    

}