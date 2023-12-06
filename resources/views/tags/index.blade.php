@extends('layouts.app')

@section('content')
    <div class="content">
        <h1>Tags</h1>

        @if($tags->isEmpty())
            <p>No tags available.</p>
        @else
            <ul class="list-group">
                @foreach($tags as $tag)
                    <li class="list-group-item">{{ $tag->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection