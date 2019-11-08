@extends('layouts.app')

@section('content')
<h1>Posts</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
        
            <div class="img-thumbnail" style="width:100%">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                            <img class="card-img-top p-4" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image" style="width:100%">
                    </div>
                
                    <div class="col-md-8 col-sm-8">
                        <div class="p-5">
                            <h3><strong>{{$post->title}}</strong></h3>
                            <p><small class="text-muted">Written on {{$post->created_at}} by {{ucfirst($post->user->name)}}</small></p>  
                            <a href="/posts/{{$post->id}}">See more</a>
                        </div>
                    </div>
                </div>
            </div>
          
            <br>
        @endforeach
        {{$posts->links()}}
    @else
    <p>No Posts Found</p>
    @endif
@endsection
