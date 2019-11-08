@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-primary mb-4" role="button">Go Back</a>
    
    <h3>{{$post->title}}</h3>
    <p><small class="text-muted">Written on {{$post->created_at}} by {{ucfirst($post->user->name)}}</small></p>
    <hr>
    <div>
        <h4>{!! $post->body !!}</h4>
    </div>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary" role="button">Edit Post</a>
    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection
