@extends('layout/home/main')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                    @if(session('error'))
                        <div style="color: green">{{ session('error') }}</div>
                    @endif
                        <form id="loginForm" action = {{url('/login')}} method = "post" >
                          @csrf
                        <div class="mb-3">
                                <label for="user_name" class="form-label">User Name</label>
                                <input type="text" class="form-control" name = "user_name" id="user_name" placeholder="Enter User Name" value = "{{old('user_name')}}" >
                                @error('user_name')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name = "password" id="password" placeholder="Enter your password" value = "{{old('password')}}">
                                @error('password')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <br/>
                            Don't have an account?
                            <a href = "{{url('register')}}">
                                Registration
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection