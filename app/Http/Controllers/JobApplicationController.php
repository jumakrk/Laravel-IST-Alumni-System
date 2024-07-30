<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    // Show the job application form
    public function create(Job $job)
    {
        return view('jobs.apply', compact('job'));
    }

    // Handle the job application form submission
    public function store(Request $request, Job $job)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'cover_letter' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store the CV file
        $cvPath = $request->file('cv')->store('cvs');

        // Create a new job application record
        JobApplication::create([
            'job_id' => $job->id,
            'user_id' => Auth::id(), // Assuming the user is logged in
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cover_letter' => $validated['cover_letter'],
            'cv_path' => $cvPath,
        ]);

        // Redirect with a success message
        return redirect()->route('jobs.index')->with('success', 'Your application has been submitted successfully!');
    }
}

