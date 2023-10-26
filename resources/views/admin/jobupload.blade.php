@extends('layout/admin/main')

@section('content')
<div class="col-sm-12">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Upload Job Details</div>
            @if(session('success'))
            <div style="color: green">{{ session('success') }}</div>
            @endif
            <div class="card-body">
                <form id="jobUploadForm" action="{{ url('admin/jobupload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="job_title" class="form-label">Job Title <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="job_title" id="job_title" value="{{ old('job_title') }}" placeholder="Enter job title">
                        @error('job_title')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Job Description <span style="color: red;">*</span></label>
                        <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter job description">{{ old('description') }}</textarea>
                        @error('description')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
    <label for="minimum_education" class="form-label">Minimum Education <span style="color: red;">*</span></label>
    <input type="text" class="form-control" name="minimum_education" id="minimum_education" value="{{ old('minimum_education') }}" placeholder="Enter minimum education required">
    @error('minimum_education')
    <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="experience_level" class="form-label">Experience Level <span style="color: red;">*</span></label>
    <select class="form-select" name="experience_level" id="experience_level">
        @for ($i = 0; $i <= 10; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
    @error('experience_level')
    <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="requirement" class="form-label">Skills Requirements <span style="color: red;">*</span></label>
    <textarea class="form-control" name="requirement" id="requirement" rows="4" placeholder="Enter job requirements">{{ old('requirement') }}</textarea>
    @error('requirement')
    <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="benefits" class="form-label">Benefits </label>
    <textarea class="form-control" name="benefits" id="benefits" rows="4" placeholder="Enter job benefits">{{ old('benefits') }}</textarea>
    @error('benefits')
    <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location <span style="color: red;">*</span></label>
                        <input type="text" class ="form-control" name="location" id="location" value="{{ old('location') }}" placeholder="Enter job location">
                        @error('location')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="salary" id="salary" value="{{ old('salary') }}" placeholder="Enter salary">
                        @error('salary')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="employment_type" class="form-label">Employment Type <span style="color: red;">*</span></label>
                        <select class="form-select" name="employment_type" id="employment_type">
                            <option value="0">Full-time</option>
                            <option value="1">Part-time</option>
                            <option value="2t">Contract</option>
                        </select>
                        @error('employment_type')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="posting_date" class="form-label">Posting Date <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="posting_date" id="posting_date" value="{{ old('posting_date') }}">
                        @error('posting_date')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for "application_deadline" class="form-label">Application Deadline <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="application_deadline" id="application_deadline" value="{{ old('application_deadline') }}">
                        @error('application_deadline')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact_email" class="form-label">Contact Email <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" name="contact_email" id="contact_email" value="{{ old('contact_email') }}" placeholder="Enter contact email">
                        @error('contact_email')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact_phone" class="form-label">Contact Phone (Optional)</label>
                        <input type="tel" class="form-control" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}" placeholder="Enter contact phone (optional)">
                        @error('contact_phone')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="opening_number" class="form-label">Opening Number <span style="color: red;">*</span></label>
                        <input type="number" class="form-control" name="opening_number" id="opening_number" value="{{ old('opening_number') }}" placeholder="Enter the number of job openings">
                        @error('opening_number')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role <span style="color: red;">*</span></label>
                        <select class="form-select" name="role" id="role">
                        <option value="">None</option>
                            <option value="1">Software Engineer</option>
                        </select>
                        @error('role')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
