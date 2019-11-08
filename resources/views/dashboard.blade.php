@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <a class="btn btn-primary" href="/posts/create">Create Post</a>                          
                        <h3 class="m-3">Your Blog Posts</h3>
                        @if (count($posts) > 0)                 
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary" role="button">Edit Post</a></td>
                                            <td>    
                                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                {!! Form::close() !!}
                                            </td>  
                                        </tr>
                                    @endforeach                                      
                                </tbody>
                            </table>
                        @else
                            <p>No posts have been posted yet</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
