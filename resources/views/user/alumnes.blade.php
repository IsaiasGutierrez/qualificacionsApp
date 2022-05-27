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
<h1>Notes alumnes</h1>
<div class="cajagroga table-responsive" style="padding-bottom:20px;">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Nom</th>
        <th colspan="{{$aa*2}}">UF</th>
        <th>Comentaris</th>
        <th>Accions</th>
      </tr>
    </thead>

    <tbody>

      @foreach ($alumne as $alu)
        <tr>
          <td class="align-middle">{{$alu->nom}} {{$alu->cognoms}}</td>
          <form action="{{route('asignarnotes', ['id'=>$alu->id,'curs_id'=>$idcurs,'modul_id'=>$idmodul])}}">

              @foreach ($uf as $cu)
                          <td  class="align-middle">{{$cu->nom}}</td>
                          <td  class="align-middle"><select style="background-color: #f2c645;  border: 1px solid #f2c645;" class="form-select" name="notes[{{$cu->id}}]" id="notes">
                  @for($i = 0; $i<11;$i++)
                          {{-- @if ($cu->pivot->uf_id == $cu->id && $cu->pivot->alumne_id == $alu->id && $cu->pivot->notes == $i)
                            <option value="{{$i}}" selected>{{$i}}</option>            
                          @else --}}
                            <option value="{{$i}}">{{$i}}</option>
                          {{-- @endif --}}

                  @endfor
              @endforeach

              </select></td> 
              <td class="align-middle">
                <div class="form-floating">
                  <textarea style="background-color: #f2c645; border:1px solid #f2c645" name="comentaris" id="comentaris" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                  <label for="floatingTextarea">Comentaris</label>
                </div>
              </td>
              <td class="align-middle"> 
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-12">
                    <a href="">
                      <button type="submit" class="btn btn-primary"><ion-icon name="send"></ion-icon></button>
                    </a>
                  </div>

                  <div class="col-md-6 col-sm-6 col-12">
                    <a href="{{route('todasnotas',$alu->id)}}">
                      <button type="button" class="btn btn-primary"><ion-icon name="document-text"></ion-icon></button>
                    </a>                
                  </div>
                </div>



              </td>
            </tr>
          </form>
      @endforeach      

    </tbody>
  </table>
</div>
@stop