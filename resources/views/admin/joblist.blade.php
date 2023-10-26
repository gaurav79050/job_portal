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
                <th>ID</th>
                <th>Job Title</th>
                <th>Location</th>
                <th>Employment Type</th>
                <th>Posting Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->job_title }}</td>
                @php
                $location = implode(',',json_decode($job->location));
                @endphp
                <td>{{ $location }}</td>
                @if( $job->employment_type == 0)
                <td> Full Time </td>

                @elseif($job->employment_type == 1)
                <td> Part Time </td>

                @else
                <td> Contract </td>
                @endif
                <td> {{$job->posting_date}} </td>
                <td>
                    <a href="{{ route('showjob', ['id' => $job->id]) }}" class="btn btn-info"> View</a>
                    <a href="{{ route('editjob', ['id' => $job->id]) }}" class="btn btn-warning"> Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $job->id }}">Delete</button>
                </td>
                </td>
            </tr>


            <!-- // Job modal  -->
            <div class="modal fade" id="deleteModal-{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this job?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a href="{{ route('deletejob', ['id' => $job->id]) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
    <p>Showing {{ $jobs->firstItem() }} to {{ $jobs->lastItem() }} of {{ $jobs->total() }} results</p>
    <div class="d-flex justify-content-end">
        
        <ul class="pagination">
            @if ($jobs->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $jobs->previousPageUrl() }}" class="page-link" rel="prev">Previous</a>
                </li>
            @endif

            @if ($jobs->hasMorePages())
                <li class="page-item">
                    <a href="{{ $jobs->nextPageUrl() }}" class="page-link" rel="next">Next</a>
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