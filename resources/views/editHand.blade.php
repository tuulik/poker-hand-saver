@extends('app')

@section('content')
    <h1>Edit poker hand</h1>
    {!! Form::model($pokerhand, ['url' => 'pokerhand/' . $pokerhand->id, 'method' => 'PATCH']) !!}
    <div class="form-group">
        {!! Form::label('hand', 'Hand') !!}
        {!! Form::text('hand', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit poker hand', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'url' => 'pokerhand/' . $pokerhand->id]) !!}
    <div class="form-group">
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@endsection