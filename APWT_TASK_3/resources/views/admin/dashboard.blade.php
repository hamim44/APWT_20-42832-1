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
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
            {{session()->forget('message')}}
    @endif
    <table class="table table-border">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td><a class="btn btn-warning" href="/user/userEdit/{{$user->id}}">Edit</a></td>
                <td><a class="btn btn-danger" href="userDelete/{{$user->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
    @endsection
</body>
</html>
