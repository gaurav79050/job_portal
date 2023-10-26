@extends('layout/user/main')

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
                <th>Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->fname}} {{$user->lname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->user_name}}</td>
                <td>{{$user->mobile}}</td>

                <td>
                <a href="{{ route('edit_user_profile', ['id' => $user->id ]) }}" class = "btn btn-primary">Edit</a>
                           
                </td>
            </tr>

        </tbody>
    </table>
</div>
@endsection