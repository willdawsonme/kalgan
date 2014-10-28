@extends('layouts.main')

@section('content')

    <h1>Login</h1>

    {{ Form::open(['route' => ['login']]) }}

        {{ Form::field(['name' => 'uts_id', 'label' => 'UTS ID', 'error' => $errors, 'parameters' => ['required']]) }}
        {{ Form::field(['name' => 'password', 'type' => 'password', 'error' => $errors, 'parameters' => ['required']]) }}
        {{ HTML::submit('Login') }}

    {{ Form::close() }}

@stop