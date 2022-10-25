@extends('layouts.app')
@section('content')
<h2>Edit Student</h2>
<form action="{{route('userEditSubmit')}}" class="form-group" method="post">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-4 form-group">
        <span>ID</span>
        <input type="text" name="id" value="{{$user->id}}" class="form-control" hidden>
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-4 form-group">
        <span>Name</span>
        <input type="text" name="username" value="{{$user->username}}" class="form-control">
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <span>Email</span>
        <input type="text" name="email" value="{{$user->email}}"class="form-control">
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <span>date of birth</span>
        <input type="date" name="dob" value="{{$user->dob}}"class="form-control">
        @error('dob')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <input type="submit" class="btn btn-warning" value="Update" >
</form>
@endsection
