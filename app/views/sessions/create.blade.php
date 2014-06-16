@extends('template.main')

@section('content')
<div class="page-header">
    <h1>Zaloguj się</h1>
</div>
<div class="row">
    {{ Form::open(['route' => 'sessions.store', 'method' => 'post']) }}
    <div class="col-sm-12 col-md-6 col-lg-4">

        @if (Session::has('flash_message'))
        <div class="form-group">
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">×</a>
                <p class="error">{{ Session::get('flash_message') }}</p>
            </div>
        </div>
        @endif

        <div class="form-group">
            {{ Form::label('nick', 'Login:', ['class' => 'control-label']) }}
            {{ Form::text('nick', '', ['class' => 'form-control', 'required' => 'required' ]) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Hasło', ['class' => 'control-label']) }}
            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Zaloguj', ['class' => 'btn btn-primary']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>

@stop