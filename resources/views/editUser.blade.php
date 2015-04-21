@extends('app')

@section('content')
    <h1>Edit user</h1>
    {!! Form::model($user, ['url' => 'updateUser' . $user->id, 'method' => 'PATCH']) !!}

        <div class="form-group">
            {!! Form::text('name', $user->name, ['class' => 'form-control'] !!}
        </div>

        <div class="form-group">
            {!! Form::text('email', $user->email, ['class' => 'form-control'] !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
@endsection