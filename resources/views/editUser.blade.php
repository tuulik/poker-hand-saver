@extends('app')

@section('content')
    <h1>Edit user</h1>
    {!! Form::model($user, ['url' => 'update-user/' . $user->id, 'method' => 'PATCH', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('avatar', 'Avatar') !!}
            @if($user->avatar != null)
                <img src="{{ Croppa::url(asset('/avatars/' . $user->avatar), 100, 100) }}">
            @else
                <img src="{{ Croppa::url(asset('/avatars/default.png'), 100, 100) }}">
            @endif<br>
            {!! Form::file('avatar') !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
@endsection