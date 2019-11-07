@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">{{$title}}</h1>
    <p class="lead">This is the Advanced Web Engineering Project Welcome Page</p>
    <hr class="my-4">
    <p> <a href="/login" class="btn btn-primary btn-lg" role="button">Login</a>
        <a href="/register" class="btn btn-success btn-lg" role="button">Register</a> </p>
</div>
@endsection