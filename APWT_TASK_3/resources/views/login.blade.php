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
    <div class="field-md">
        <fieldset>
            <legend><div class="legend"><h2>Log in</h2></div></legend>
            <form action="{{route('loginSubmit')}}" class="form-group" method="post">
            {{ csrf_field() }}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                {{session()->forget('message')}}
            @endif
            <div class="col-md-4 form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}">
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="col-md-4 form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

                <input type="submit" class="btn btn-success" value="Submit" >
            </form>
        </fieldset>
    </div>

    @endsection
</body>
</html>
