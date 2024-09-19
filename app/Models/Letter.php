<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Letter
 *
 * @property $id
 * @property $letter_type
 * @property $letter_number
 * @property $date
 * @property $from
 * @property $title
 * @property $file
 * @property $type_letter_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Letter extends Model
{
    
    static $rules = [
		'letter_type' => 'required',
		'letter_number' => 'required',
		'date' => 'required',
		'from' => 'required',
		'title' => 'required',
		'file' => 'mimes:pdf,jpg,jpeg|max:2048',
		'type_letter_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['letter_type','letter_number','date','from','title','file','type_letter_id'];

    public function typeLetter()
    {
      return $this->belongsTo(TypeLetter::class);
    }

}
