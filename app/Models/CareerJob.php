<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerJob extends Model
{

    protected $table = 'career_jobs';

    protected $fillable = [
        'title', 'contact', 'job_type', 'description', 'status'
    ];
}
