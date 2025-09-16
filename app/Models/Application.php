<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'maju_career_applications';

    protected $fillable = [
        'job_type',
        'name',
        'contact',
        'email',
        'dob',
        'salary_desired',
        'postal_address',
        'city',
        'is_shortlisted'
    ];

    // Relationships
    public function permanentFaculty()
    {
        return $this->hasOne(PermanentFaculty::class, 'application_id');
    }

    public function visitingFaculty()
    {
        return $this->hasOne(VisitingFaculty::class, 'application_id');
    }

    public function staff()
    {
        return $this->hasOne(Staff::class, 'application_id');
    }
}
