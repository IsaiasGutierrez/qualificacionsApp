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
<h1>Users</h1>
<div class="cajagroga table-responsive" style="padding-bottom:20px;">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Accions</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($users as $usu)
                <tr>
                    <td class="align-middle">{{$usu->name}}</td>
                    <td class="align-middle">{{$usu->email}}</td>
                    <td class="align-middle">
                    @if ($usu->role_id == 0)
                        <span>Sí</span>
                    @endif

                    @if ($usu->role_id == 1)
                        <span>No</span>
                    @endif
                    </td>
                    <td>
                        <a href="{{route('deleteusu',$usu->id)}}">
                            <button class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                        </a>
                        <a href="{{route('editusu',$usu->id)}}">
                            <button type="button" onclick="" class="btn btn-primary"><ion-icon name="pencil-outline"></ion-icon></button>
                        </a>
                    </td>

                </tr>
                
            @endforeach
        </tbody>
        
    </table>
    <a href="{{route('crearusu')}}">
        <button type="button" class="btn btn-success">Afegir  <ion-icon name="add-circle-outline"></ion-icon></Button>
    </a>
</div>

@stop