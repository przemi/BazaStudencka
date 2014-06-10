@extends('template.main')

@section('content')
   <div class="page-header">
       <h1>Lokalizacje</h1>
   </div>
   <div class="row">
       <div class="col-md-8">
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
                   <td><button type="button" class="btn btn-primary btn-sm">Szczegóły</button></td>
               </tr>
               @endforeach
           </table>
       </div>
       <div class="col-md-4 menu-right">
           <div class="row text-center">
                <a href="/localizations/create"> <button type="button" class="btn btn-primary">Dodaj lokalizację</button></a>
           </div>
       </div>
   </div>
@stop