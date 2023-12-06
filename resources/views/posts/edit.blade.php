@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <a href="{{route('posts.index')}}">Posts</a>
    </div>
</div>
<div class="card mt-4">
    <h5 class="card-header">Edit post</h5>
    <div class="card-body">
        <form action="{{route('posts.update', $post->id)}}" method="post" class="">
            @csrf
            @method('PUT')
            <input class="form-control" type="text" name="title" value="{{$post->title}}" /><br>
            <input class="form-control" type="text" name="slug" value="{{$post->slug}}" /><br>
            <input class="form-control" type="text" name="excerpt" value="{{$post->excerpt}}" /><br>
            <input class="form-control" type="text" name="content" value="{{$post->content}}" /><br>
            <input class="form-control" type="number" name="min_to_read" value="{{$post->min_to_read}}" /><br>
            <input type="hidden" name="user_id" value="1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="row justify-content-between">
        <div class="col-10">
            <div class="px-3">
                <form action="{{route('posts.detach_tag', $post->id)}}" method="post" class="row justify-content-start">
                    @csrf
                    @forelse($post->tags as $tag)
                    <div class="col-2">
                      <label for="{{$tag->id}}-{{$tag->slug}}" class="form-check-label">
                        <input class="form-check-input" name="detach_tag[]" id="{{$tag->id}}-{{$tag->slug}}" type="checkbox" value="{{$tag->id}}"  />
                        <span class="badge rounded-pill text-bg-info">{{$tag->name}}</span>
                    </label>  
                    </div>
                    

                    @empty
                    No tags for this post
                    @endforelse
                    
                    <div class="row">
                        <div class="col-2">
                        <button class="btn btn-danger btn-sm mt-3 col" hidden  id="detach_btn">Remove Selected Tag</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-2 p-4">
            <div class="btn-group " >
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    Add Tags
                </button>
                <form action="{{route('posts.attach_tag', $post->id)}}" method="post">
                    @csrf
                    <ul class="dropdown-menu">
                        @foreach($tags->except($post->tags()->pluck('id')->toArray()) as $tag)
                        <li>
                            <label for="{{$tag->slug}}-{{$post->id}}" class="form-check-label dropdown-item">
                                <input class="form-check-input" name="attach_tag[]" id="{{$tag->slug}}-{{$post->id}}" type="checkbox" value="{{$tag->id}}"  />
                                {{$tag->name}}
                            </label>
                        </li>
                        @endforeach
                        <li>
                            <button class="btn btn-primary form-control">Submit</button>
                        </li>
                    </ul>
                </form>


            </div>
        </div>
    </div>
    <script type="module">
  $(document).ready(function() {
    $('input[name="detach_tag[]"]').change(function() {
      // Check if at least one checkbox is checked
      if ($('input[name="detach_tag[]"]:checked').length > 0) {
        // Enable the button
        $('#detach_btn').prop('hidden', false);
      } else {
        // Disable the button if no checkbox is checked
        $('#detach_btn').prop('hidden', true);
      }
    });
  });
    </script>
</div>
@endsection
