@extends('template.main')

@section('content')
   <div class="page-header">
       <h1>Wydarzenia</h1>
   </div>
   <div class="row">
       <div class="col-md-8">
           <table class="table table-hover">
               <thead>
                   <th>Nazwa</th>
                   <th>Lokalizacja</th>
                   <th>Data</th>
                   <th>Opis</th>
                   <th>Autor</th>
                   <th></th>
               </thead>
               @foreach($events as $key => $event)
               <tr>
                   <td>{{$event->name}}  </td>
                   <td>{{$event->localization->name}}  </td>
                   <td>{{$event->date}}  </td>
                   <td>{{$event->info}}  </td>
                   <td>{{$event->user->nick}}  </td>
                   <td><button type="button" class="btn btn-primary btn-sm">Szczegóły</button></td>
               </tr>
               @endforeach
           </table>
       </div>
       <div class="col-md-4 menu-right">
           <div class="row text-center">
                <a href="/events/create"> <button type="button" class="btn btn-primary">Dodaj wydarzenie</button></a>
           </div>
       </div>
   </div>
@stop