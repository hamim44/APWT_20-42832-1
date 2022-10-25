@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')
    <h2>Welcome user: {{session()->get('username')}}</h2>
    <br><br>
    <div class="field-md">
        <fieldset>
            <legend><div class="legend"><h2>User Profile</h2></div></legend>
            <form action="{{route('uDashboardSubmit')}}" class="form-group" method="post">
            {{ csrf_field() }}
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                        {{session()->forget('message')}}
                @endif
            <div class="col-md-4 form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="col-md-4 form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label for="dob">DATE OF BIRTH</label>
                <input type="date" name="dob" class="form-control" id="dob" value="{{$user->dob}}">
                @error('dob')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

                <input type="submit" class="btn btn-success" value="Update" >
            </form>

        </fieldset>
    </div>
    @endsection
</body>
</html>
