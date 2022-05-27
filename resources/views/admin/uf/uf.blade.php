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
<h1>Ufs</h1>
<div class="cajagroga table-responsive" style="padding-bottom:20px;">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th>Nom UF</th>
            <th>Mòdul</th>
            <th>Hores</th>
            <th>Accions</th>
            </tr>


        </thead>
        <tbody>
            @foreach ($ufs as $uf)
                <tr>
                    <td class="align-middle">{{$uf->nom}}</td>

                    @if(isset($uf->modul->nom))
                    <td class="align-middle">{{$uf->modul->nom}}</td>
                    @else
                    <td>Sense mòdul</td>
                    @endif
                    
                    <td class="align-middle">{{$uf->hores}}</td>
                    <td>
                        <a href="{{route('deleteuf',$uf->id)}}">
                            <button class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                        </a>
                        <a href="{{route('edituf', $uf->id)}}">
                            <button type="button" onclick="" class="btn btn-primary"><ion-icon name="pencil-outline"></ion-icon></button>
                        </a>
                    </td>

                </tr>
                
            @endforeach
        </tbody>
        
    </table>
    <a href="{{route('crearuf')}}">
        <button type="button" class="btn btn-success">Afegir  <ion-icon name="add-circle-outline"></ion-icon></Button>
    </a>
</div>

@stop