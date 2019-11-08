@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-primary mb-4" role="button">Go Back</a>
    
    <h3>{{$post->title}}</h3>
    <p><small class="text-muted">Written on {{$post->created_at}} by {{ucfirst($post->user->name)}}</small></p>
    <hr>
    <img class="card-img-top p-4" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image" style="width:50%">
    <br><br>
    <div>
        <h4>{!! $post->body !!}</h4>
    </div>
    <hr>

    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)

            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary" role="button">Edit Post</a>
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
            
        @endif
    @endif
@endsection
