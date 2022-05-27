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
<h1>Mòduls</h1>
<div class="cajagroga table-responsive" style="padding-bottom:20px;">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nom mòdul</th>
                <th>Hores</th>
                <th>Curs</th>
                <th>Professor</th>
                <th>Accions</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($modulos as $modulo)
                <tr>
                    <td class="align-middle">{{$modulo->nom}}</td>
                    <td class="align-middle">{{$modulo->hores}}</td>
                    
                    @if(isset($modulo->curso->nom))
                    <td class="align-middle">{{$modulo->curso->nom}}</td>
                    @else
                    <td>Sense curs</td>
                    @endif

                    @if(isset($modulo->user->name))
                    <td class="align-middle">{{$modulo->user->name}}</td>
                    @else
                    <td>Sin profesor</td>
                    @endif
                    <td>
                        <a href="{{route('deletemodul', $modulo->id)}}">
                          <button class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                        </a>
                        <a href="{{route('editmodul', $modulo->id)}}">
                            <button type="button" onclick="" class="btn btn-primary"><ion-icon name="pencil-outline"></ion-icon></button>
                        </a>
                    </td>

                </tr>
                
            @endforeach
        </tbody>
        
    </table>
    <a href="{{route('crearmodul')}}">
        <button type="button" class="btn btn-success">Afegir  <ion-icon name="add-circle-outline"></ion-icon></Button>
    </a>
</div>

@stop