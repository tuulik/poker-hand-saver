@extends('app')

@section('content')
    <h1>Add new poker hand</h1>
    {!! Form::open(['url' => 'pokerhand', 'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('hand', 'Hand') !!}
        {!! Form::text('hand', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add poker hand', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection