@extends('template.main')

@section('content')
   <div class="page-header">
       <h1>Lokalizacje</h1>
   </div>
   <div class="row">
       <div class="col-md-9">
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
                           @if(Auth::user()->id == $loc->user_id)
                                <a href="{{ route('localizations.edit', array($loc->id)) }}"><button type="button" class="btn btn-primary btn-sm">Edytuj</button></a>
                                <button type="button" class="btn btn-danger btn-sm delete_localization" target="{{ URL::route('localizations.delete', array($loc->id)) }}"  >Usuń</button>
                           @endif
                       @else
                           <button type="button" class="btn btn-sm btn-primary " disabled="disabled" >Szczegóły</button>
                       @endif
                   </td>
               </tr>
               @endforeach
           </table>
       </div>
       <div class="col-md-3 menu-right">
           <div class="row text-center">
               @if (Auth::check())
                <a href="/localizations/create"> <button type="button" class="btn btn-primary">Dodaj lokalizację</button></a>
               @endif
           </div>
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
                <h4 class="modal-title" id="myModalLabel">Usuwanie lokalizacji</h4>
            </div>
            <div class="modal-body">
                Potwierdź usunięcie lokalizacji.
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

        $('.table').on('click', '.show_localization', function(){
            hrf = $(this).attr('target');
            $.get( hrf, function( data ) {
                $('#modal .modal-content').html(data);
            });
        });

        $('.table').on('click', '.delete_localization', function(){
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