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
                        <div class="card-header">{{ $job->title }}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection