@extends('template.main')

@section('content')
<div class="page-header">
    <h1>Nowe wydarzenie</h1>
</div>
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['route' => 'events.store', 'method' => 'post']) }}

            <div class="form-group">
                <label for="name">Nazwa wydarzenia:</label>
                <input type="text" class="form-control" id="name" name="name" placeHolder="Tutaj wpisz nazwę nowego wydarzenia">
            </div>

            <div class="form-group">
                <label for="date">Termin wydarzenia:</label>
                <input type="text" class="form-control" id="date" name="date" placeHolder="Tutaj wpisz datę wydarzenia">
            </div>

            <div class="form-group">
                <label for="localization">Lokalizacja wydarzenia:</label>
                <select class="form-control" id="localization" name="localization" >
                    <option value="0">---wybierz lokalizację---</option>
                    <option value="1">Poznań - Nowa Lokalizacja 1</option>
                    <option value="2">Poznań - Nowa Lokalizacja 2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="info">Opis wydarzenia:</label>
                <textarea class="form-control" id="info" name="info" ></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Dodaj wydarzenie</button>
            </div>

        {{ Form::close() }}

    </div>
</div>
@stop