@extends('template.main')

@section('content')
    <div class="jumbotron" style="margin-top: 20px;">
        <h1>Hornets system</h1>
        <p>Witamy w Hornets system - innowacyjnej bazie wiedzy studenckiej</p>
    </div>
    <div class="row">
        {{ Form::open(['route' => 'events.search', 'method' => 'post']) }}
        <div class="col-lg-6">
            <div class="input-group">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Wyszukaj wydarzenie</button>
                  </span>
                <input type="text" name="search" class="form-control">
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        {{ Form::close() }}
        {{ Form::open(['route' => 'localizations.search', 'method' => 'post']) }}
        <div class="col-lg-6">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Wyszukaj lokalizacje</button>
                  </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        {{ Form::close() }}
    </div><!-- /.row -->
@stop