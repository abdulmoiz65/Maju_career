<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerJob;

class CareerJobController extends Controller
{
    /**
     * Show the form to create a new job.
     */
    public function create()
    {
        return view('admin.pages.createjob');
    }

    /**
     * Store a new job in database.
     */
public function store(Request $request)
{
    $data = $request->validate([
        'title'       => 'required|string|max:200',
        'contact'     => 'nullable|string|max:255',
        'job_type'    => 'required|in:permanent_faculty,visiting_faculty,staff',
        'description' => 'required|string',
        'status'      => 'required|in:Active,Inactive',
    ]);

    CareerJob::create($data); // ✅ Only once

    return redirect()
        ->route('jobs.index')
        ->with('success', 'Job posted successfully!');
}

    public function edit($id)
{
    $job = CareerJob::findOrFail($id); // fetch the job or 404
    return view('admin.pages.editjob', compact('job'));
}



    public function update(Request $request, $id)
{
    $job = CareerJob::findOrFail($id);

    $validated = $request->validate([
        'title'       => 'required|string|max:200',
        'contact'     => 'nullable|string|max:255',
        'job_type'    => 'required|in:permanent_faculty,visiting_faculty,staff',
        'description' => 'required|string',
        'status'      => 'required|in:Active,Inactive',
    ]);

    $job->update($validated);

    return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
}


    /**
     * Show all jobs (for admin).
     */
    public function index()
    {
        $jobs = CareerJob::latest()->paginate(10);
        return view('admin.pages.viewjobs', compact('jobs'));
    }

    public function destroy($id)
{
    $job = CareerJob::findOrFail($id);
    $job->delete();

    return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
}

}
