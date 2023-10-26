@extends('layout/admin/main')

@section('content')

<div class="container">
    <h3>Job Details</h3>
    @if(session('error'))
    <div style="color: green">{{ session('error') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Job Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobapplications as $job)
            <tr>
                <td>{{ $job->job_id }}</td>
                <td>{{ $job->name }}</td>
                <td> {{$job->email}} </td>
                <td> {{$job->contact}} </td>
                <td>
                <a href="{{route('view-resume',['id' =>$job->id])}}" target="_blank">
                    <i class="fas fa-eye"></i> View Resume
                </a>
                </td>
            </tr>



            @endforeach
        </tbody>
    </table>
    <p>Showing {{ $jobapplications->firstItem() }} to {{ $jobapplications->lastItem() }} of {{ $jobapplications->total() }} results</p>
    <div class="d-flex justify-content-end">
        
        <ul class="pagination">
            @if ($jobapplications->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $jobapplications->previousPageUrl() }}" class="page-link" rel="prev">Previous</a>
                </li>
            @endif

            @if ($jobapplications->hasMorePages())
                <li class="page-item">
                    <a href="{{ $jobapplications->nextPageUrl() }}" class="page-link" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Next</span>
                </li>
            @endif
        </ul>
    </div>
</div>


@endsection