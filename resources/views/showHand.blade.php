@extends('app')

@section('content')

    <p>User: <a href="{{url('view-user/' . $hand->user->id)}}">{{$hand->user->name }}</a> {{ $hand->user->avatar }} <br>Hand: {{$hand->hand}} <br>Description: {{$hand->description}}
    @if($editHand == true)
            <br><a href="{{$hand->id . '/edit'}}">Edit hand</a>
    @endif
    </p>
@endsection