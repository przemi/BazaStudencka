@extends('template.main')

@section('content')
<div class="page-header">
    <h1>Wydarzenia dla frazy: '{{ $search }}'</h1>
</div>
<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <table class="table table-hover">
            <thead>
            <th>Nazwa</th>
            <th>Lokalizacja</th>
            <th>Data</th>
            <th>Autor</th>
            <th></th>
            </thead>
            @foreach($events as $key => $event)
            <tr>
                <td>{{$event->name}}  </td>
                <td>{{$event->localization->name}}  </td>
                <td>{{ substr($event->date, 0 , -9) }}  </td>
                <td>{{$event->user->nick}}  </td>
                <td>
                    @if (Auth::check())
                    <button type="button" class="btn btn-primary btn-sm show_event" target="{{ URL::route('events.view', array($event->id)) }}" data-toggle="modal" data-target="#modal" >Szczegóły</button>
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

<!-- small modal -->
<div class="modal fade bs-example-modal-sm" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Usuwanie wydarzenia</h4>
            </div>
            <div class="modal-body">
                Potwierdź usunięcie wydarzenia.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                <button type="button" class="btn btn-primary" id="delete">Usuń</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('headerJs')
@parent
<script type="text/javascript" >
    $(document).ready(function(){

        $('.table').on('click', '.show_event', function(){
            hrf = $(this).attr('target');
            $.get( hrf, function( data ) {
                $('#modal .modal-content').html(data);
            });
        });

        $('.table').on('click', '.delete_event', function(){
            hrf = $(this).attr('target');
            $('#modal-delete').modal('show');
            $('#delete').click(function(){
                $.ajax({
                    type: "POST",
                    url: hrf,
                    assync:false,
                    cache:false,
                    success: function( data ) {
                        location.reload();
                    }
                });
                return false;
            });
        });

    });
</script>
@stop