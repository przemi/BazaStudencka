@extends('template.main')

@section('content')
   <div class="page-header">
       <h1>Wydarzenia</h1>
   </div>
   <div class="row">
       <div class="col-md-8">
           <table class="table table-hover">
               <tr>
                   <th>Nazwa</th>
                   <th>Lokalizacja</th>
                   <th>Data</th>
                   <th>Opis</th>
                   <th>Autor</th>
               </tr>
           </table>
       </div>
       <div class="col-md-4 menu-right">
            <div class="row text-center">
                <button type="button" class="btn btn-primary">Szczegóły</button>
           </div>
           <div class="row text-center">
                <a href="/events/add"> <button type="button" class="btn btn-primary">Dodaj wydarzenie</button></a>
           </div>
       </div>
   </div>
@stop