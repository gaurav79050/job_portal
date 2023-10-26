@extends('layout/admin/main')

@section('content')

<div class="container">
    <h3>My Details</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Company Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->fname}} {{$user->lname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->user_name}}</td>
                <td>{{$user->company_name}}</td>
                <td>
                <a href="{{ route('editprofile', ['id' => $user->id ]) }}" class = "btn btn-primary">Edit</a>
                           
                </td>
            </tr>

        </tbody>
    </table>
</div>
@endsection