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
<h1>Alumnes</h1>
<div class="cajagroga table-responsive" style="padding-bottom:20px;">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th>Nom</th>
            <th>Cognom</th>
            <th>DNI</th>
            <th>Curs</th>
            <th>Email</th>
            <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnes as $alumn)
                <tr>
                    <td class="align-middle">{{$alumn->nom}}</td>
                    <td class="align-middle">{{$alumn->cognoms}}</td>
                    <td class="align-middle">{{$alumn->dni}}</td>
                    @if(isset($alumn->cursos->nom))
                    <td class="align-middle">{{$alumn->cursos->nom}}</td>
                    @else
                    <td>Sense Alumne</td>
                    @endif
                    <td class="align-middle">{{$alumn->email}}</td>
                    <td>
                        <a href="{{route('deletealumne',$alumn->id)}}">
                            <button class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                        </a>
                        <a href="{{route('editalumne', $alumn->id)}}">
                            <button type="button" onclick="" class="btn btn-primary"><ion-icon name="pencil-outline"></ion-icon></button>
                        </a>
                    </td>

                </tr>
                
            @endforeach
        </tbody>
        
    </table>
    <a href="{{route('crearalumne')}}">
        <button type="button" class="btn btn-success">Afegir  <ion-icon name="add-circle-outline"></ion-icon></Button>
    </a>
</div>

@stop