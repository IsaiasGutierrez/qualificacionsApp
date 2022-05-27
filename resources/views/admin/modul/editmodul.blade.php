@extends('layouts.master')

@section('content')

<div class="row cajagroga" style="margin-top:40px">
   <h1 style="margin-top: 2%;">Editar <span>{{$modul->nom}}</span></h1>
    <div class="offset-md-3 col-md-6">
       <div class="card" style="margin-top: 2%; margin-bottom:5%;border-color:#ed9234">
          <div class="card-body" style="padding:30px;background-color: #ed9234;">
            
            <form action="{{route('updatemodul',$modul->id)}}" method="POST">
               @csrf
               @method('PUT')
               <div class="input-group input-group-sm mb-3">
                  <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">Nom</span>
                  <input name="nom" id="nom" type="text" class="form-control border border-0" value="{{$modul->nom}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
               </div>
    
               <div class="input-group input-group-sm mb-3">
                  <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">Hores</span>
                  <input name="hores" id="hores" type="int" pattern="([0-9]{0,4})" title="nomes pots escriure un numero de 4 xifres" class="form-control border border-0" value="{{$modul->hores}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
               </div>

               <div class="input-group input-group-sm mb-3">
                  <label style="background-color: #dd8227" class="input-group-text border border-0" for="id_curs">Curs</label>
                  <select class="form-select border-0 form-select-sm" name="id_curs" id="id_curs">
            
   
            
            
                     @foreach($cursos as $cur)
                     @if(isset($modul->curso->id))
                        @if ($cur->id == $modul->curso->id)
                        <option value="{{$cur->id}}" selected>{{$cur->nom}}</option>
                        @else
                        <option value="{{$cur->id}}">{{$cur->nom}}</option>
                        @endif
                     @else
                        <option value="{{$cur->id}}">{{$cur->nom}}</option>
                     @endif

                     @endforeach
                  </select>
                </div>

               <div class="input-group input-group-sm mb-3">
                  <label style="background-color: #dd8227" class="input-group-text border border-0" for="id_user">User</label>
                  <select class="form-select border-0 form-select-sm" name="id_users" id="id_users">
                     @foreach($users as $usu)
                        @if(isset($modul->user->id))
                           @if ($usu->id == $modul->user->id)
                              <option value="{{$usu->id}}" selected>{{$usu->name}}</option>
                           @else
                              <option value="{{$usu->id}}">{{$usu->name}}</option>
                           @endif
                        @else
                           <option value="{{$usu->id}}">{{$usu->name}}</option>
                        @endif
                     @endforeach
                  </select>
               </div>

               <div class="row form-group text-center" style="display: flex">
                  <button type="submit" class="btn btn-primary" style="margin-top:25px;">
                     <span>Editar</span>
                  </button>

                  <a class="btn btn-danger border border-danger" style="margin-top:25px;" href="{{route('modul')}}">
                     <span>Cancel·lar</span>
                  </a>                

               </div>
            </form>
          </div>
       </div>
    </div>
 </div>
 
@stop