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
<h1>Cursos</h1>
<div class="cajagroga table-responsive" style="padding-bottom:20px;">
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nom del curs</th>
            <th>Accions</th>
          </tr>
        </thead>
    
        <tbody>
          @foreach ($cursos as $object)
            <tr>
              <td class="align-middle">{{ $object->nom }}</td>
              <td>
                <a href="{{route('borrarcurs',$object->id)}}">
                  <button class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                </a>
                <a href="{{route('editcurs',$object->id)}}">
                  <button type="button" onclick="" class="btn btn-primary"><ion-icon name="pencil-outline"></ion-icon></button>
                </a>
            </td>
            </tr>
          @endforeach
        </tbody>
        
    
    </table>
    <a href="{{route('crearcurs')}}">
      <button type="button" class="btn btn-success">Afegir  <ion-icon name="add-circle-outline"></ion-icon></Button>
    </a>
            

</div>
@stop