<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job;
use App\Models\JobApplication;

class UserController extends Controller
{
    public function index() {
        $loggedInUser = Auth::user();
        $jobs = Job::with('jobRequirement')->orderBy('posting_date', 'desc')->paginate(1); 
        foreach ($jobs as $job) {
            $jobId = $job->id;
            $count = JobApplication::where('job_id', $jobId)->count();
            $job->totalJobApplications = $count;
        }
        return view('user/dashboard', ['jobdetails' => $jobs]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user/profile', ['user' => $user]);
    }

    public function editprofile(Request $request, $id = 0)
    {

        if ($request->isMethod('put')) {
            $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'user_name' => 'required|string|max:255',
                'email' => 'required|email',
                'mobile' => 'required|digits:10|numeric',
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
                $user->save();

                return redirect()->back()->with('success', 'Profile updated successfully');
            } catch (\Exception $e) {
                
                return back()->with('error', 'An error occurred while creating the job.');
            }
        }

        if ($id != 0) {
            $user = Auth::user();
            return view('user/editprofile', ['user' => $user]);
        }
    }
}
