<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\JobPostedNotification;

class JobsController extends Controller
{

    public function index()
    {
        $jobs = Job::with('user')->get(); // Fetch jobs with user information
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'qualifications' => 'required|string',
            'application_deadline' => 'required|date',
            'posted_at' => 'required|date',
        ]);
    
        $job = Job::create([
            'title' => $request->title,
            'location' => $request->location,
            'type' => $request->type,
            'description' => $request->description,
            'qualifications' => $request->qualifications,
            'application_deadline' => $request->application_deadline,
            'posted_at' => $request->posted_at,
            'user_id' => auth()->id(),
        ]);
    
        // Notify users based on their major
        $users = User::where('major', $job->type)->get();
        foreach ($users as $user) {
            $user->notify(new JobPostedNotification($job));
        }
    
        return redirect()->route('jobs.index')->with('status', 'Job posted successfully.');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        $majors = ['Software Development', 'Cyber Security'];
        return view('jobs.edit', compact('job', 'majors'));

    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'posted_at' => 'required|date',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index')->with('status', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')->with('status', 'Job deleted successfully.');
    }
}
