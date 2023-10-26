<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user_name' => 'required|string|max:255|unique:users',
            'company_name' => $request->user_type == 0 ? '' : 'required|string|max:255|unique:users',
            'mobile' => 'required|digits:10|max:255|unique:users',
            'user_type' => 'required|in:0,1',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);


        try {
            $token = Str::uuid();
            User::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'user_name' => $request->user_name,
                'company_name' => $request->user_type == 0 ? '' :  $request->company_name,
                'mobile' => $request->mobile,
                'user_type' => $request->user_type,
                'password' => Hash::make($request->password),
                'remember_token' => $token
            ]);
            Mail::to($request->email)->send(new RegistrationConfirmation($token));

        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('register')->with('error', 'Registration failed. Please try again.');
        }
        return redirect()->route('register')->with('success', 'Registration successful! An email has sent on your email. Please verify email');
    }


    public function confirmation($token) {
        $user = User::where('remember_token', $token)->first();

        if ($user) {
            $user->update([
                'email_verified_at' => now(),
                'remember_token' => null,
            ]);
            return redirect('/thank-you');
        } else {
            return redirect('/error');
        }
    }
    
}
