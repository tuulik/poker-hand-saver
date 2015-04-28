@extends('app')

@section('content')
    <h1>Edit user</h1>
    {!! Form::model($user, ['url' => 'update-user/' . $user->id, 'method' => 'PATCH', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('avatar', 'Avatar') !!}
            {!! HTML::image(asset('/avatars/' . $user->avatar)) !!}
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