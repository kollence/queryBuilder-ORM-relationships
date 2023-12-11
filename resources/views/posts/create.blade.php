
                    @extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{route('posts.index')}}">Posts</a>
        </div>
    </div>
        <div class="card mt-4">
            <h5 class="card-header">Create new post</h5>
            <div class="card-body">
            <form action="{{route('posts.store')}}" method="post" class="">
                        @csrf
                        <input class="form-control" type="text" name="title" placeholder="title"/><br>
                        <input class="form-control" type="text" name="slug" placeholder="slug"/><br>
                        <input class="form-control" type="text" name="excerpt" placeholder="excerpt"/><br>
                        <input class="form-control" type="text" name="content" placeholder="content"/><br>
                        <input class="form-control" type="number" name="min_to_read" placeholder="minutes to read"/><br>
                        <input type="hidden" name="user_id" value="1">
                        <button type="submit">Submit</button>
                    </form>
            </div>
        </div>
@endsection
