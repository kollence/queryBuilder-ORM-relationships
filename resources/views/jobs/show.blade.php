@extends('layouts.app')

@section('content')
<style>
    .custom-checkbox {
        position: relative;
        padding-left: 30px;
        cursor: pointer;
    }

    .custom-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkmark {
        position: absolute;
        top: -12;
        left: 12;
        height: 15px;
        width: 15px;
        background-color: #fff;
        border: 1px solid #ccc;
    }

    .custom-checkbox input:checked~.checkmark:after {
        content: "\2716";
        background-color: red;
        font-size: 12px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<div class="row">
    <div class="col-12">
        <a href="{{route('jobs.index')}}">Jobs</a>
    </div>
</div>
<div class="card mt-4">
    <h5 class="card-header">{{$job->title}}</h5>
    <div class="card-body">
        <!-- <div class="card-title">{{$job->title}}</div> -->
        <div class="card-text">{{$job->description}}</div>
    </div>
    <div class="row justify-content-between">
        <div class="col-12">
            <hr>
        </div>
        <div class="col-12">
            <h5 class="mx-3">Comments:</h5>
            <ul class="list-group">
                @forelse($job->comments as $comment)
                <li class="list-group-item">{{$comment->body}}</li>
                @empty
                <li class="list-group-item">No tags for this post</li>
                @endforelse
            </ul>
        </div>
    </div>
    <script type="module">
        $(document).ready(function() {
            $('input[name="detach_tag[]"]').change(function() {
                // Check if at least one checkbox is checked
                if ($('input[name="detach_tag[]"]:checked').length > 0) {
                    if ($('input[name="detach_tag[]"]:checked').length == 1) {
                        $('#detach_btn').text('Remove Tag')
                    } else {
                        $('#detach_btn').text('Remove Tags')
                    }
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