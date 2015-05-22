@extends('app')

@section('content')

    <p>User:<br>
        @if($hand->user->avatar != null)
            <img src="{{ Croppa::url(asset('/avatars/' . $hand->user->avatar), 100, 100) }}">
        @else
            <img src="{{ Croppa::url(asset('/avatars/default.png'), 100, 100) }}">
        @endif
        <br><a href="{{url('view-user/' . $hand->user->id)}}">{{$hand->user->name }}</a> {{ $hand->user->avatar }} <br>Hand: {{$hand->hand}} <br>Description: {{$hand->description}}
        @if($editHand == true)
            <br><a href="{{$hand->id . '/edit'}}">Edit hand</a>
        @endif
    </p>
@endsection