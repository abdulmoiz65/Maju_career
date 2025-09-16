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
    
        // Helper function for file uploads
        $saveFile = function ($field, $folder) use ($request) {
            if ($request->hasFile($field)) {
                return $request->file($field)->store("uploads/$folder", 'public');
            }
            return null;
        };
    
        // Step 2: Save extra details based on job type
        if ($request->job_type === 'permanent_faculty') {
            $data = $request->only([
                'highest_degree',
                'specialization',
                'institute',
                'passing_year',
                'post_applied',
                'org_recent',
                'designation_recent',
            ]);
    
            // Convert array → string
            if (isset($data['post_applied']) && is_array($data['post_applied'])) {
                $data['post_applied'] = implode(',', $data['post_applied']);
            }
    
            // Handle file uploads
            $data['resume'] = $saveFile('resume', 'resume');
            $data['degree_certificate'] = $saveFile('degree_certificate', 'degree');
    
            $application->permanentFaculty()->create($data);
        }
    
        if ($request->job_type === 'visiting_faculty') {
            $data = $request->only([
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
            ]);
    
            if (isset($data['post_applied']) && is_array($data['post_applied'])) {
                $data['post_applied'] = implode(',', $data['post_applied']);
            }
    
            $data['photo'] = $saveFile('photo', 'photos');
            $data['resume'] = $saveFile('resume', 'resume');
    
            $application->visitingFaculty()->create($data);
        }
    
        if ($request->job_type === 'staff') {
            $data = $request->only([
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
            ]);
    
            if (isset($data['post_applied']) && is_array($data['post_applied'])) {
                $data['post_applied'] = implode(',', $data['post_applied']);
            }
    
            $data['resume'] = $saveFile('resume', 'resume');
            $data['photo'] = $saveFile('photo', 'photos');
    
            $application->staff()->create($data);
        }
    
        return redirect('/')->with('success', 'Application submitted successfully!');
    }

            public function shortlist($id)
        {
            $application = \App\Models\Application::findOrFail($id);
            $application->is_shortlisted = true;
            $application->save();

            return redirect()->back()->with('success', 'Application has been shortlisted.');
        }

        // unshortlist
                public function unshortlist($id)
        {
            $application = \App\Models\Application::findOrFail($id);
            $application->is_shortlisted = false;
            $application->save();

            return redirect()->back()->with('success', 'Application removed from shortlist.');
        }


// shortlisted application 
                public function shortlisted(Request $request)
        {
            $query = \App\Models\Application::where('is_shortlisted', true);

            if ($request->filled('q')) {
                $q = $request->q;
                $query->where(function ($sub) use ($q) {
                    $sub->where('name', 'like', "%$q%")
                        ->orWhere('email', 'like', "%$q%")
                        ->orWhere('contact', 'like', "%$q%");
                });
            }

            if ($request->filled('job_type')) {
                $query->where('job_type', $request->job_type);
            }

            $applications = $query->paginate(10);

            return view('admin.pages.shortlisted', compact('applications'));
        }

    
public function create($jobId)
{
    $job = \App\Models\CareerJob::findOrFail($jobId);

    return view('user.pages.apply', [
        'job_type' => $job->job_type,
        'job' => $job
    ]);
}

public function index(Request $request)
{
    $query = Application::query()->with(['permanentFaculty', 'visitingFaculty', 'staff']);

    // 🔍 Filters
    if ($request->filled('q')) {
        $q = $request->q;
        $query->where(function ($sub) use ($q) {
            $sub->where('name', 'like', "%$q%")
                ->orWhere('email', 'like', "%$q%")
                ->orWhere('contact', 'like', "%$q%");
        });
    }

    if ($request->filled('job_type')) {
        $query->where('job_type', $request->job_type);
    }

    if ($request->filled('highest_degree')) {
        $query->whereHas('permanentFaculty', fn($q) => $q->where('highest_degree', $request->highest_degree))
              ->orWhereHas('visitingFaculty', fn($q) => $q->where('highest_degree', $request->highest_degree))
              ->orWhereHas('staff', fn($q) => $q->where('highest_degree', $request->highest_degree));
    }

    if ($request->filled('min_salary')) {
        $query->whereRaw('CAST(salary_desired AS UNSIGNED) >= ?', [$request->min_salary]);
    }

    if ($request->filled('max_salary')) {
        $query->whereRaw('CAST(salary_desired AS UNSIGNED) <= ?', [$request->max_salary]);
    }

    // 📋 Paginate results
    $applications = $query->orderBy('created_at', 'desc')->paginate(20);

    return view('admin.pages.view_applications', compact('applications'));
}

public function show($id)
{
    $application = Application::with(['permanentFaculty', 'visitingFaculty', 'staff'])->findOrFail($id);

    return view('admin.pages.view_application_show', compact('application'));
}

}
