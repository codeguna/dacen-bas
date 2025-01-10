<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicantAttachment extends Model
{
    use HasFactory;
    static $rules = [
		'files' => 'required|mimes:pdf,doc,docx|max:2048'
    ];

    protected $table = 'job_applicant_attachments';

    protected $fillable = ['job_applicant_id','files'];
}
