@extends('app')

@section('head')
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection

@section('content')
    <h1>Edit poker hand</h1>
    {!! Form::model($pokerhand, ['url' => 'pokerhand/' . $pokerhand->id, 'method' => 'PATCH']) !!}
    <div class="form-group">
        {!! Form::label('hand', 'Hand') !!}
        {!! Form::text('hand', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description') !!}
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