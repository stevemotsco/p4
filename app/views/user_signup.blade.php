@extends('_master')

@section('title')
    Sign Up - Sunshine Farms
@stop

@section('content_banner')
    <div>
        <h1>Sign up</h1>
    </div>
@stop

@section('content')

    {{ Form::open(array('url' => '/signup')) }}
        <div class='wbdr alldiv'>
            {{ Form::label('Email:') }}
            {{ Form::text('email') }}
            <br/>
            {{ Form::label('Confirm Email:') }}
            {{ Form::text('email_confirmation') }}
            <br/>
            {{ Form::label('Password:') }}
            {{ Form::password('password') }}
            <small>Min 8  Alpha-Numeric Characters</small>
            <br/>
            {{ Form::label('Confirm Password:') }}
            {{ Form::password('password_confirmation') }}
            <br/>
            {{ Form::submit('Submit') }}
            <br/>
        </div>
    {{ Form::close() }}

    @include('nav')
@stop