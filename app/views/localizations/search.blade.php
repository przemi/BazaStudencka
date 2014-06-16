@extends('template.main')

@section('content')
<div class="page-header">
    <h1>Lokalizacje dla frazy: '{{ $search }}'</h1>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-hover">
            <thead>
            <th>Nazwa</th>
            <th>Adres</th>
            <th>Autor</th>
            <th></th>
            </thead>
            @foreach($localizations as $k => $loc)
            <tr>
                <td>{{ $loc->name }}</td>
                <td>{{ $loc->city }} {{ $loc->street }}</td>
                <td>{{ $loc->user->nick }}</td>
                <td>
                    @if (Auth::check())
                    <button type="button" class="btn btn-primary btn-sm show_localization" target="{{ URL::route('localizations.view', array($loc->id)) }}" data-toggle="modal" data-target="#modal" >Szczegóły</button>
                    @else
                    <button type="button" class="btn btn-sm btn-primary " disabled="disabled" >Szczegóły</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</div>


<!-- large modal -->
<div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>



@stop

@section('headerJs')
@parent
<script type="text/javascript" >
    $(document).ready(function(){

        $('.table').on('click', '.show_localization', function(){
            hrf = $(this).attr('target');
            $.get( hrf, function( data ) {
                $('#modal .modal-content').html(data);
            });
        });



    });
</script>
@stop