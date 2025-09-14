<?php

namespace App\Http\Controllers;

use App\Models\CareerJob;

class UserJobController extends Controller
{
    public function index()
    {
        // Fetch all jobs (active or inactive)
        $jobs = CareerJob::latest()->get();

        return view('user.pages.index', compact('jobs'));
    }
}
