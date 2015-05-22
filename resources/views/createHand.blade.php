@extends('app')

@section('head')
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection

@section('content')
    <h1>{{Lang::get('createpokerhand.addnew')}}</h1>
    {!! Form::open(['url' => 'pokerhand', 'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('hand', Lang::get('createpokerhand.hand')) !!}
        {!! Form::text('hand', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', Lang::get('createpokerhand.description')) !!}<br>
        {!! Form::textarea('description') !!}
    </div>

    <div class="form-group">
        {!! Form::submit(Lang::get('createpokerhand.submit'), ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    <a href="{{LaravelLocalization::getLocalizedURL('en', url('pokerhand/create'))}}">English</a> <a href="{{LaravelLocalization::getLocalizedURL('fi', url('pokerhand/create'))}}">Finnish</a>
@endsection