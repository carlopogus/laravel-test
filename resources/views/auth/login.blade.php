@extends('app')

@section('content')

<h1>Login</h1>
<hr/>

{!! Form::open(['url' => 'login']) !!}

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('remember', 'Remember:') !!}
    {!! Form::checkbox('remember') !!}
</div>

<div class="form-group">
    {!! Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}

@stop