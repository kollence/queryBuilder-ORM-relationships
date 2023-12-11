@extends('layouts.app')

@section('content')
<row class="">
    <div class="col-12">
        <a href="{{route('posts.create')}}">New Post</a>
    </div>
</row>
@foreach($posts as $post)
<div class="card mt-4">
    <h5 class="card-header">{{$post->title}}</h5>
    <div class="card-body">
    <div class="row">
        <div class="col-8">
        <h5 class="card-title">creator: {{$post->user->name}}</h5>
        <p class="card-text">{{$post->excerpt}}</p>
        <p class="card-text">created at: {{date('j M Y', strtotime($post->created_at))}}
        <div>
            <small>Minutes to read: {{$post->min_to_read}}</small>
        </div>
        </p>

        </div>
        <div class="col-4">
            @if($post->image()->exists())
                <img src="{{$post->image->url}}" class="img-thumbnail" alt="...">
            @endif
        </div>
    </div>
        <div class="row">
            <div class="col-1">
                <form action="{{route('posts.destroy', $post->id)}}" class="flex justify-right w-full" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <div class="col-1">
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning">Edit</a>
            </div>
            <div class="col-1">
                <a href="{{route('posts.show', $post->id)}}" class="btn btn-secondary">Show</a>
            </div>
        </div>
        <div class="card-footer">
            @if($post->tags()->exists())
            Tags:
            @foreach($post->tags as $tag)
            <span class="badge rounded-pill text-bg-info">{{$tag->name}}</span>
            @endforeach
            @endif
            <!-- no tags yet. do you want to <a href="{{route('posts.edit', $post->id)}}">create one</a>? -->


        </div>
    </div>
</div>
@endforeach
<div class="row">
    <div class="col-10">{{$posts->links()}}</div>
</div>

@endsection