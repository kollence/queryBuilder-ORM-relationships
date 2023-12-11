@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Jobs</h1>

    @if($jobs->isEmpty())
    <p>No jobs available.</p>
    @else
    <ul class="list-group">
        @foreach($jobs as $job)
        <li class="list-group-item">
            <div class="card">
                <div class="card-body">{{ $job->title }}</div>
                @if($job->tags()->exists())
                <div class="card-footer">
                    Tags:
                    @foreach($job->tags as $tag)
                    <span class="badge rounded-pill text-bg-info">{{$tag->name}}</span>
                    @endforeach
                </div>
                @endif
            </div>
        </li>

        @endforeach
    </ul>
    @endif
</div>
@endsection