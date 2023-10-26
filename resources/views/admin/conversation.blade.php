@extends('layout/admin/main')

@section('content')
<div class="container">
    <h1>Conversation</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Message</th>
                <th>Enquiry Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->contact }}</td>
                <td>{{ $message->message }}</td>
                <td>{{ $message->created_at }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection