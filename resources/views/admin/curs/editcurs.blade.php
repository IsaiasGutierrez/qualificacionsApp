@extends('layouts.master')

@section('content')

<div class="row cajagroga" style="margin-top:40px">
   <h1 style="margin-top: 2%;">Editar <span>{{$curso->nom}}</span></h1>
    <div class="offset-md-3 col-md-6">
       <div class="card" style="margin-top: 2%; margin-bottom:5%;border-color:#ed9234">
          <div class="card-body" style="padding:30px;background-color: #ed9234;">
 
            <form action="{{route('updatecurs',$id)}}" method="POST">
             @csrf
             @method('PUT')
             @foreach($cursos as $object )

             <div class="input-group input-group-sm mb-3">
               <span style="background-color: #dd8227;" class="input-group-text border border-0" id="inputGroup-sizing-sm">Nom</span>
               <input name="nom" id="nom" type="text" class="form-control border border-0" value="{{$object->nom}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
             @endforeach

             <div class="row form-group text-center" style="display: flex">
               <button type="submit" class="btn btn-primary" style="margin-top:25px;">
                  <span>Editar</span>
               </button>

               <a class="btn btn-danger border border-danger" style="margin-top:25px;" href="{{route('curs')}}">
                  <span>Cancel·lar</span>
               </a>                

            </div>
 
            </form>
          </div>
       </div>
    </div>
 </div>
 
@stop