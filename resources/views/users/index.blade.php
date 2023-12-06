
@extends('layouts.app')

@section('content')
    @foreach($users as $user)
        <div class="card mt-4">
            <h5 class="card-header">{{$user->name}}</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                <p class="card-text">{{$user->email}}</p>
                <p class="card-text">created at: {{date('j M Y', strtotime($user->created_at))}}</p>

                    </div>
                    <div class="col-6">
                    @if($user->contact()->exists())
                            <p class="mt-4 card-text">
                            address: {{$user->contact->address}} <br>
                            number: {{$user->contact->number}} <br>
                            city: {{$user->contact->city}} <br>
                            zip_code: {{$user->contact->zip_code}} <br>
                            </p>
                            @else
                            <p class="card-text">
                            <div class="flex justify-between">
                                <form action="{{route('users.storeContact', $user->id)}}" class="row justify-right w-full" method="post">
                                @csrf
                                <input class="my-2" type="text" name="address" placeholder="Address" /> <br>
                                <input class="my-2" type="text" name="number" placeholder="number"/><br>
                                <input class="my-2" type="text" name="city" placeholder="city" /><br>
                                <input class="my-2" type="text" name="zip_code" placeholder="zip_code" /><br>
                                <button type="submit" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                            </p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-10">{{$users->links()}}</div>
    </div>
@endsection


