<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index(Request $req) {

    $user_name = $req->input('user_name');
    $password = $req->input('password');
    $req->validate([
        'user_name' => 'required',
        'password' => 'required',
    ]);
    

    if (Auth::attempt(['user_name' => $user_name, 'password' => $password])) {

        $user = Auth::user();
       
        if ($user && $user->email_verified_at != null) {
            
            $req->session()->put('userId',$user->id );
            $req->session()->put('user_name',$user->name );
            $req->session()->put('profile_image',$user->image );
            
            if($user->user_type == 1){  
                return redirect()->route('admin');
            }
            if (session()->has('redirect_url') ) {
                return redirect(session('redirect_url'));
            } 
            return redirect()->route('user');
        } 
        else {
            
            return redirect()->route('login')->with('error', 'First Verify your email.');
        }


    } else {
        return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.');
    }
   }
}