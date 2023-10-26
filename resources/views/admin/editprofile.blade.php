@extends('layout/admin/main')

@section('content')
@if(session('success'))
            <div style="color: green">{{ session('success') }}</div>
            @endif
<form id="registrationform" action={{url('/admin/editprofile')}} method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type = "hidden" name="user_id" value = "{{$user->id}}" />
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name 
                            <span style="color: red;">*</span>
                        </label>
                        <input type="text" class="form-control" name="fname" id="fname" value="{{ old('fname', $user->fname) }}" placeholder="Enter your first name">
                        @error('fname')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name
                        <span style="color: red;">*</span>

                        </label>
                        <input type="text" class="form-control" name="lname" id="lname" value="{{ old('lname',$user->lname) }}" placeholder="Enter your last name">
                        @error('lname')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="user_name" class="form-label">User Name
                        <span style="color: red;">*</span>
                        </label>
                        <input type="text" class="form-control" name="user_name" id="user_name" value="{{ old('user_name',$user->user_name) }}" placeholder="Enter user name">
                        @error('user_name')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address
                        <span style="color: red;">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="Enter your email">
                        @error('email')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile
                        <span style="color: red;">*</span>
                        </label>
                        <input type="number" class="form-control" name="mobile" id="mobile" value="{{ old('mobile', $user->mobile) }}" placeholder="Enter your mobile">
                        @error('mobile')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3" id="company_name_field">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company_name" id="company_name" value="{{ old('company_name', $user->company_name) }}" placeholder="Enter company name">
                        @error('company_name')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                   
                </form>

@endsection