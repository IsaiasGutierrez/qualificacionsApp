@extends('layouts.master')

@section('content')

<div class="row cajagroga" style="margin-top:40px">
   <h1 style="margin-top: 2%;">Editar <span class="text-capitalize">{{$user->name}}</span></h1>
    <div class="offset-md-3 col-md-6">
       <div class="card" style="margin-top: 2%; margin-bottom:5%;border-color:#ed9234">
          <div class="card-body" style="padding:30px;background-color: #ed9234;">
            
            <form action="{{route('updateuser',$user->id)}}" method="POST">
             @csrf
             @method('PUT')
             <div class="input-group input-group-sm mb-3">
               <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">Nom</span>
               <input name="nom" id="nom" type="text" class="form-control border border-0" value="{{$user->name}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group input-group-sm mb-3">
               <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">E-mail</span>
               <input name="email" id="email" type="email" pattern="([A-Za-z0-9]{0,25})+(.([A-Za-z0-9]{0,25}))\w@[i][n][s][c][a][m][i][d][e][m][a][r].[c][a][t]" title="Nomes pots inscriure usuaris amb el domini inscamidemar.cat" class="form-control border border-0" value="{{$user->email}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
               {{-- <input name="email" id="email" type="email" class="form-control border border-0" aria-label="Sizing example input" pattern="([A-Za-z0-9]{0,25})+(.([A-Za-z0-9]{0,25}))\w@[x][t][e][c].[c][a][t]" title="Nomes pots inscriure usuaris amb el domini xtec.cat" value="{{$user->email}}" aria-describedby="inputGroup-sizing-sm"> --}}
            </div>

            <div class="input-group input-group-sm mb-3">
               <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">Contrasenya</span>
               <input name="password" id="password" type="password" class="form-control border border-0" value="{{$user->password}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            

            @if ($user->role_id == 0)
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="admin" id="admin" value="0" checked>
                  <label class="form-check-label" for="inlineRadio1">Admin</label>
               </div>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="admin" id="admin" value="1">
                  <label class="form-check-label" for="inlineRadio2">User</label>
               </div>
            @endif

            @if ($user->role_id == 1)
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="admin" id="admin" value="0">
                  <label class="form-check-label" for="inlineRadio1">Admin</label>
               </div>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="admin" id="admin" value="1" checked>
                  <label class="form-check-label" for="inlineRadio2">User</label>
               </div>                
            @endif
               



            <div class="row form-group text-center" style="display: flex">
               <button type="submit" class="btn btn-primary" style="margin-top:25px;">
                  <span>Editar</span>
               </button>

               <a class="btn btn-danger border border-danger" style="margin-top:25px;" href="{{route('user')}}">
                  <span>Cancel·lar</span>
               </a>                

            </div>
 
            </form>
          </div>
       </div>
    </div>
 </div>
 
@stop