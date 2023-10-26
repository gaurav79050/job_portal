@extends('layout/home/main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><b>Registration</b></div>
            @if(session('success'))
            <div style="color: green">{{ session('success') }}</div>
            @endif
            <div class="card-body">
                <form id="registrationform" action={{url('/register')}} method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name 
                            <span style="color: red;">*</span>
                        </label>
                        <input type="text" class="form-control" name="fname" id="fname" value="{{ old('fname') }}" placeholder="Enter your first name">
                        @error('fname')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name
                        <span style="color: red;">*</span>

                        </label>
                        <input type="text" class="form-control" name="lname" id="lname" value="{{ old('lname') }}" placeholder="Enter your last name">
                        @error('lname')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="user_name" class="form-label">User Name
                        <span style="color: red;">*</span>
                        </label>
                        <input type="text" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') }}" placeholder="Enter user name">
                        @error('user_name')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address
                        <span style="color: red;">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email">
                        @error('email')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile
                        <span style="color: red;">*</span>
                        </label>
                        <input type="number" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Enter your mobile">
                        @error('mobile')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password
                        <span style="color: red;">*</span>
                        </label>
                        <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Enter your password">
                        @error('password')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="c_password" class="form-label">Confirm Password
                        <span style="color: red;">*</span>
                        </label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" id="c_password" placeholder="Confirm password">
                        @error('password_confirmation')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    @if(request()->has('key') && request()->query('key') == "recruiter")
                    <div class="mb-3">
                        <label for="user_type" class="form-label">User Type
                        <span style="color: red;">*</span>
                        </label>
                        <select class="form-select" name="user_type" id="user_type">
                            <option value="1" {{ old('user_type') == '1' ? 'selected' : '' }}>Employer</option>

                        </select>
                        @error('user_type')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    @elseif(request()->has('key') && request()->query('key') == "seeker")
                    <div class="mb-3">
                        <label for="user_type" class="form-label">User Type
                        <span style="color: red;">*</span>
                        </label>
                        <select class="form-select" name="user_type" id="user_type">
                            <option value="0" {{ old('user_type') == '0' ? 'selected' : '' }}>Job Seeker</option>
                        </select>
                        @error('user_type')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    @else
                    <div class="mb-3">
                        <label for="user_type" class="form-label">User Type
                        <span style="color: red;">*</span>
                        </label>
                        <select class="form-select" name="user_type" id="user_type">
                            <option value="0" {{ old('user_type') == '0' ? 'selected' : '' }}>Job Seeker</option>
                            <option value="1" {{ old('user_type') == '1' ? 'selected' : '' }}>Employer</option>

                        </select>
                        @error('user_type')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif

                    <div class="mb-3" id="company_name_field">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company_name" id="company_name" value="{{ old('company_name') }}" placeholder="Enter company name">
                        @error('company_name')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary">Register</button>
                    <br>
                    if Already Registered
                    <a href="{{url('login')}}">
                        Login
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        const companyField = $('#company_name_field');
        companyField.hide();
        $('#user_type').on('change', function () {
            const companyField = $('#company_name_field');
            if (this.value === '1') { 
                companyField.show();
            } else { 
                companyField.hide();
            }
        });
    });
</script>
@endsection