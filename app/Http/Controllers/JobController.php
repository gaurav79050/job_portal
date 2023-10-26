<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobRequirement;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function showjob(Request $request, $id = 0)
    {
        $loggedInUser = Auth::user();
        if ($id != 0) {
            $jobs = Job::where('id', $id)->with('jobRequirement')->get();
            if ($jobs->isEmpty()) {
                $jobs = Job::with('jobRequirement')->orderBy('posting_date', 'desc')->get();
                return redirect()->route('user', ['jobs' => $jobs])->with('error', 'Job has been deleted By recruiter');
            }
            $jobApplications = JobApplication::where('user_id', $loggedInUser->id)
                ->where('job_id', $id)
                ->first();
                if($jobApplications === null) {
                   
                    $alreadyApplied = 0;
                }
                else{
                    $alreadyApplied['created_at'] = $jobApplications->created_at;
                    $alreadyApplied['set'] = 1;
                } 

            $count = JobApplication::where('job_id', $id)->count();
            return view('user/jobdetails', ['jobdetails' => $jobs, 'alreadyApplied'=> $alreadyApplied, 'total_applications'=> $count]);
        }
    }

    public function applyjob(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'contact' => 'required|string',
                'resume' => 'required|mimes:pdf,doc,docx',
                'designation' => 'required|string|max:255',
            ]);
            $user = Auth::user();
            $jobApplication = new JobApplication();
            $jobApplication->job_id = $request->input('job_id');
            $jobApplication->company_id = $request->input('company_id');
            $jobApplication->user_id = $user->id;
            $jobApplication->name = $request->input('name');
            $jobApplication->email = $request->input('email');
            $jobApplication->contact = $request->input('contact');
            $jobApplication->designation = $request->input('designation');

            $resumePath = $request->file('resume')->store('resumes');
            $jobApplication->resume = $resumePath;
            $jobApplication->save();
            return back()->with('success', 'Application submitted successfully');
        } catch (\Exception $e) {

            return back()->with('error', 'An error occurred while creating the job.');
        }
    }
}
