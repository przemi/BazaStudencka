@extends('template.main')

@section('content')
<div class="page-header">
    <h1>Edytuj wydarzenie</h1>
</div>
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['route' => ['events.save',event->id], 'method' => 'post']) }

            <div class="form-group">
                <label for="name">Nazwa wydarzenia:</label>
                <input type="text" class="form-control" id="name" name="name" placeHolder="Tutaj wpisz nazwę nowego wydarzenia" value="{{ event->name }}">
            </div>

            <div class="form-group">
                <label for="date">Termin wydarzenia:</label>
                <input type="text" class="form-control" id="date" name="date" placeHolder="Tutaj wpisz datę wydarzenia" value="{{ event->date }}">
            </div>

            <div class="form-group">
                <label for="localization">Lokalizacja wydarzenia:</label>
                <select class="form-control" id="localization" name="localization" >
                    @foreach($localizations as $k => $loc)
                        @if( $event->localization->name == $loc->name){
                            <option value="{{ $loc->id }}"  selected="selected">{{ $loc->name }} - {{ $loc->city }} {{ $loc->street }}</option>
                        @} else {
                            <option value="{{ $loc->id }}">{{ $loc->name }} - {{ $loc->city }} {{ $loc->street }}</option>
                        @}
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="info">Opis wydarzenia:</label>
                <textarea class="form-control" id="info" name="info" >{{ event->info }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Edytuj wydarzenie</button>
            </div>

        {{ Form::close() }}

    </div>
</div>
@stop

@section('headerJs')
@parent
    <script type="text/javascript" >
        $(document).ready(function(){
           $('#date').datepicker( { dateFormat: "yy-mm-dd" });
        });
    </script>
@stop