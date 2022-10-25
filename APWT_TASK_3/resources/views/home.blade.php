@extends('layouts.app')
@section('content')
<div>
    <h1>Welcome to our website!!</h1>
    <br>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    {{session()->forget('message')}}
    @endif

</div>
@endsection
