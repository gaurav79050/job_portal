@extends('layout/home/main')

@section('content')
<div class="com-sm-12">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3>Job Seeker</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Welcome to our platform. Sign up or log in as a User to explore and apply for job opportunities.
                    </p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('register',['key' => 'seeker'])}}" class="btn btn-dark w-100">Register</a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('login')}}" class="btn btn-secondary w-100">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3> Recruiter</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">Are you a company looking to post job listings? Sign up or log in as a Recruiter to get started.</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('register',['key' => 'recruiter'])}}" class="btn btn-dark w-100">Register</a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('login')}}" class="btn btn-secondary w-100">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection