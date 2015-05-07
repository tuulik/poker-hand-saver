@extends('app')

@section('content')

    <p>User: {{$hand->user->name }} {{ $hand->user->avatar }} <br>Hand: {{$hand->hand}} <br>Description: {{$hand->description}}</p>

@endsection