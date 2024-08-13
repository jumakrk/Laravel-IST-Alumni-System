<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\JobApplicationMail;
use Illuminate\Support\Facades\Mail;
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
        $cvPath = $request->file('cv')->store('cvs', 'public');

        // Create a new job application record
        $application = JobApplication::create([
            'job_id' => $job->id,
            'user_id' => Auth::id(), // Assuming the user is logged in
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cover_letter' => $validated['cover_letter'],
            'cv_path' => $cvPath,
        ]);

        // Prepare the application data to send in the email
        $applicationData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cover_letter' => $validated['cover_letter'],
            'cv_url' => Storage::url($cvPath),
        ];

        // Find all users with the 'admin' role
        $admins = User::role('admin')->get();

        // Send email to each admin
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new JobApplicationMail($applicationData));
        }

        // Redirect with a success message
        return redirect()->route('jobs.show', $job->id)->with('success', 'Your application has been submitted successfully!');
    }
}
