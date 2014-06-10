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
               <tr>
                   <td>Testowe wydarzenie</td>
                   <td>Testowa lokalizacja</td>
                   <td>12-06-2014</td>
                   <td>Testowy opis</td>
                   <td>Jan Kowalski</td>
                   <td><button type="button" class="btn btn-primary btn-sm">Szczegóły</button></td>
               </tr>
           </table>
       </div>
       <div class="col-md-4 menu-right">
           <div class="row text-center">
                <a href="/events/create"> <button type="button" class="btn btn-primary">Dodaj wydarzenie</button></a>
           </div>
       </div>
   </div>
@stop