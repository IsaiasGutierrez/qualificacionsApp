@extends('layouts.master')

@section('content')
<head>
  <style>
      ion-icon {
          margin-top: 5px;
      }

      h1{
          margin-bottom: 2%;
      }

  </style>
</head>
<h1>Mòduls de <span class="text-capitalize">{{$user->name}}</span> </h1>
<div class="cajagroga table-responsive" style="padding-bottom:20px;">
  <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Curs</th>
            <th>Accions</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($user->moduls as $mod)
            <tr>
              <td class="align-middle">{{$mod->nom}}</td>
              @if(isset($mod->curso->nom))
              <td class="align-middle">{{$mod->curso->nom}}</td>
              @else
              <td>Sin curso</td>
              @endif

              <td> 
                <a href="{{ route('alumnesModul',['id'=>$mod->id,'curs_id'=>$mod->curs_id])}}">
                  <button class="btn btn-primary"><ion-icon name="book-outline"></ion-icon></button>
                </a>

                <a href="{{route('cursresum',$mod->curso->id)}}">
                  <button class="btn btn-primary" ><ion-icon  name="list-circle-outline"></ion-icon></button>
                </a>
            </td>
            </tr>
          @endforeach
          </tbody>
    
    </table>
    

</div>
@stop