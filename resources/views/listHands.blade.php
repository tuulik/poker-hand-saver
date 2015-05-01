@extends('app')

@section('content')
    @foreach($hands as $hand)
        <p>Hand: {{$hand->hand}} Description: {{$hand->description}}</p>
    @endforeach
@endsection