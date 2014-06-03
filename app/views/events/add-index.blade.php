@extends('template.main')

@section('content')
<div class="page-header">
    <h1>Nowe wydarzenie</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <form role="form">
            <div class="form-group">
                <label for="nazwa">Nazwa wydarzenia:</label>
                <input type="text" class="form-control" id="nazwa" name="nazwa" placeHolder="Tutaj wpisz nazwę nowego wydarzenia">
            </div>
        </form>
    </div>
</div>
@stop