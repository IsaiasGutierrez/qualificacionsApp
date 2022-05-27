@extends('layouts.master')

@section('content')


<div class="row cajagroga" style="margin-top:40px">
   <h1 style="margin-top: 2%;">Crear alumne</h1>
    <div class="offset-md-3 col-md-6">
       <div class="card" style="margin-top: 2%; margin-bottom:5%;border-color:#ed9234">
          <div class="card-body" style="padding:30px;background-color: #ed9234;">
            
            <form action="{{route('crearalumne2')}}" method="POST">
             @csrf
             @method('PUT')

             <div class="input-group input-group-sm mb-3">
               <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">Nom</span>
               <input name="nom" id="nom" type="text" class="form-control border border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group input-group-sm mb-3">
               <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">Cognoms</span>
               <input name="cognoms" id="cognoms" type="text" class="form-control border border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group input-group-sm mb-3">
               <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">DNI</span>
               <input name="dni" id="dni" type="text" class="form-control border border-0" pattern="[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]" title="Introdueix un DNI valid" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group input-group-sm mb-3">
               <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">E-mail</span>
               <input name="email" id="email" type="email" class="form-control border border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group input-group-sm mb-3">
               <label style="background-color: #dd8227" class="input-group-text border border-0" for="id_curs">Curs</label>
               <select class="form-select border-0 form-select-sm" name="id_curs" id="id_curs">
                  @foreach($curs as $me)
                     <option value="{{$me->id}}">{{$me->nom}}</option>
                  @endforeach
               </select>
             </div>

            <div class="row form-group text-center" style="display: flex">
               <button type="submit" class="btn btn-primary" style="margin-top:25px;">
                  <span>Editar</span>
               </button>

               <a class="btn btn-danger border border-danger" style="margin-top:25px;" href="{{route('alumne')}}">
                  <span>Cancel·lar</span>
               </a>                

            </div>
 
            </form>
          </div>
       </div>
    </div>
 </div>
 
@stop