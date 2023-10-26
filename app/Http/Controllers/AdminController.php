<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\JobRequirement;
use App\Models\JobApplication;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jobcount = Job::where('user_id', $user->id)->count();
        $applicationcount = JobApplication::where('company_id', $user->id)->count();
        return view('admin/dashboard', ['jobcount' => $jobcount, 'applicationcount' => $applicationcount]);
    }

    public function jobupload(Request $request)
    {
        try {
            $user = Auth::user();
            $request->validate([
                'job_title' => 'required|string|max:255',
                'description' => 'required|string',
                'minimum_education' => 'required|string',
                'experience_level' => 'required|integer|min:0',
                'requirement' => 'required|string',
                'benefits' => 'string',
                'location' => 'required|string|max:255',
                'salary' => 'required',
                'employment_type' => 'required',
                'posting_date' => 'required|date',
                'application_deadline' => 'required|date',
                'contact_email' => 'required|string|email|max:255',
                'contact_phone' => 'nullable|string|max:255',
                'opening_number' => 'required|integer|min:1',
                'role' => 'required',
            ]);

            $location_arr = explode(',', $request->input('location'));
            $location = json_encode(array_map('trim', $location_arr));

            $minimum_education_arr = explode(',', $request->input('minimum_education'));
            $minimum_education = json_encode(array_map('trim', $minimum_education_arr));

            $job = new Job;
            $job->job_title = $request->input('job_title');
            $job->description = $request->input('description');
            $job->company_name = $user->company_name;
            $job->location = $location;
            $job->salary = $request->input('salary');
            $job->employment_type = $request->input('employment_type');
            $job->posting_date = $request->input('posting_date');
            $job->application_deadline = $request->input('application_deadline');
            $job->contact_email = $request->input('contact_email');
            $job->contact_phone = $request->input('contact_phone');
            $job->opening_number = $request->input('opening_number');
            $job->role = $request->input('role');
            $job->user_id = $user->id;
            $job->save();

            $job_requirement = new JobRequirement();
            $job_requirement->job_id = $job->id;
            $job_requirement->minimum_education = $minimum_education;
            $job_requirement->experience_level = $request->input('experience_level');
            $job_requirement->requirement_text = $request->input('requirement');
            $job_requirement->benefits = $request->input('benefits');
            $job_requirement->save();

            return redirect()->route('jobupload')->with('success', 'Job created successfully.');
        } catch (\Exception $e) {
            // Handle exceptions here, e.g., log the error or return a specific error view.
            return back()->with('error', 'An error occurred while creating the job.');
        }
    }


    public function joblist()
    {
        $user_id = Auth::id();
        $jobs = Job::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(1); 
        return view('admin/joblist', ['jobs' => $jobs]);
    }

    public function showjob(Request $request, $id = 0)
    {
        if ($id != 0) {
            $jobs = Job::where('id', $id)->with('jobRequirement')->orderBy('posting_date', 'desc')->get();
            if ($jobs->isEmpty()) {
                $user_id = Auth::id();
                $jobs = Job::where('user_id', $user_id)->orderBy('posting_date', 'desc')->get();
                return redirect()->route('joblist', ['jobs' => $jobs])->with('error', 'Job has been deleted');
            }
            $count = JobApplication::where('job_id', $id)->count();
            return view('admin/jobdetails', ['jobdetails' => $jobs, 'count' => $count]);
        }
    }

    public function editjob(Request $request, $id = 0)
    {
        if ($request->isMethod('put')) {
            try {
                $user = Auth::user();
                $request->validate([
                    'job_title' => 'required|string|max:255',
                    'description' => 'required|string',
                    'minimum_education' => 'required|string',
                    'experience_level' => 'required|integer|min:0',
                    'requirement' => 'required|string',
                    'benefits' => 'string',
                    'location' => 'required|string|max:255',
                    'salary' => 'required',
                    'employment_type' => 'required',
                    'posting_date' => 'required|date',
                    'application_deadline' => 'required|date',
                    'contact_email' => 'required|string|email|max:255',
                    'contact_phone' => 'nullable|string|max:255',
                    'opening_number' => 'required|integer|min:1',
                    'role' => 'required',
                ]);




                $location_arr = explode(',', $request->input('location'));
                $location = json_encode(array_map('trim', $location_arr));

                $minimum_education_arr = explode(',', $request->input('minimum_education'));
                $minimum_education = json_encode(array_map('trim', $minimum_education_arr));

                $job = Job::find($request->input('job_id'));
                $job->job_title = $request->input('job_title');
                $job->description = $request->input('description');
                $job->company_name = $user->company_name;
                $job->location = $location;
                $job->salary = $request->input('salary');
                $job->employment_type = $request->input('employment_type');
                $job->posting_date = $request->input('posting_date');
                $job->application_deadline = $request->input('application_deadline');
                $job->contact_email = $request->input('contact_email');
                $job->contact_phone = $request->input('contact_phone');
                $job->opening_number = $request->input('opening_number');
                $job->role = $request->input('role');
                $job->user_id = $user->id;
                $job->save();

                $job_requirement = JobRequirement::where('job_id', $job->id)->first();
                $job_requirement->job_id = $job->id;
                $job_requirement->minimum_education = $minimum_education;
                $job_requirement->experience_level = $request->input('experience_level');
                $job_requirement->requirement_text = $request->input('requirement');
                $job_requirement->benefits = $request->input('benefits');
                $job_requirement->save();

                return redirect()->route('editjob', ['id' => $request->input('job_id')])->with('success', 'Job Updated successfully.');
            } catch (\Exception $e) {

                return back()->with('error', 'An error occurred while creating the job.');
            }
        } else {
            if ($id != 0) {
                $jobs = Job::where('id', $id)->with('jobRequirement')->orderBy('posting_date', 'desc')->get();
                return view('admin/editjob', ['jobdetails' => $jobs]);
            }
        }
    }

    public function deletejob($id = 0)
    {
        try {
            if ($id != 0) {
                $job = Job::find($id);
                $job->jobRequirement()->delete();
                $job->delete();
                return redirect()->route('joblist')->with('success', 'Job Deleted successfully.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while creating the job.');
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin/profile', ['user' => $user]);
    }

    public function editprofile(Request $request, $id = 0)
    {

        if ($request->isMethod('put')) {
            $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'user_name' => 'required|string|max:255',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'company_name' => 'required|string|max:255',
            ]);
            try {


                $user = User::find($request->user_id);

                if (!$user) {
                    return redirect()->back()->with('error', 'User not found');
                }
                $user->fname = $request->fname;
                $user->lname = $request->lname;
                $user->user_name = $request->user_name;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
                $user->company_name = $request->company_name;
                $user->save();

                return redirect()->back()->with('success', 'Profile updated successfully');
            } catch (\Exception $e) {
                return back()->with('error', 'An error occurred while creating the job.');
            }
        }

        if ($id != 0) {
            $user = Auth::user();
            return view('admin/editprofile', ['user' => $user]);
        }
    }

    public function applications()
    {
        $user = Auth::user();
        $jobapplications = JobApplication::where('company_id', $user->id)->paginate(1);
        return view('admin/user_applications', ['jobapplications' => $jobapplications]);
    }

    public function viewResume($id = 0)
    {
      
        $jobApplication = JobApplication::where('id', $id)->first();
        
        // Check if the job application exists and has a resume file
        if ($jobApplication && $jobApplication->resume) {
            $filePath = storage_path('app/' . $jobApplication->resume);            
            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Disposition' => 'inline; filename="' . $jobApplication->resume . '"',
                    'Content-Type' => 'application/pdf', // Adjust the content type as needed
                ]);
            }
        }

        abort(404);
    }
}
