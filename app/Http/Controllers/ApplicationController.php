<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\PermanentFaculty;
use App\Models\VisitingFaculty;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\CareerJob;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Step 1: Create the base application
        $application = Application::create([
            'job_type' => $request->job_type,
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
            'dob' => $request->dob,
            'salary_desired' => $request->salary_desired,
            'postal_address' => $request->postal_address,
            'city' => $request->city,
        ]);

        // Step 2: Save extra details based on job type
        if ($request->job_type === 'permanent_faculty') {
            $application->permanentFaculty()->create($request->only([
                'highest_degree',
                'specialization',
                'institute',
                'passing_year',
                'post_applied',
                'org_recent',
                'designation_recent',
                'resume',
                'degree_certificate'
            ]));
        }

        if ($request->job_type === 'visiting_faculty') {
            $application->visitingFaculty()->create($request->only([
                'gender',
                'join_date',
                'highest_degree',
                'specialization',
                'institute',
                'passing_year',
                'dept',
                'post_applied',
                'org_recent',
                'designation_recent',
                'years_academia',
                'years_industry',
                'photo',
                'resume'
            ]));
        }

        if ($request->job_type === 'staff') {
            $application->staff()->create($request->only([
                'gender',
                'post_applied',
                'join_date',
                'highest_degree',
                'specialization',
                'institute',
                'passing_year',
                'org_recent',
                'designation_recent',
                'date_of_joining',
                'years_experience',
                'resume',
                'photo'
            ]));
        }

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

public function create($jobId)
{
    $job = \App\Models\CareerJob::findOrFail($jobId);

    return view('user.pages.apply', [
        'job_type' => $job->job_type,
        'job' => $job
    ]);
}


}
