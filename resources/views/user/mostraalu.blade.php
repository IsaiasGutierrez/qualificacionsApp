@extends('layouts.master')

@section('content')


<html>
<head>

<body>
    <div id="alert"></div>

<div class="row cajagroga">
    <h1 class="text-end">{{$alu->nom}} {{ $alu->cognoms }}</h1>
    
<div class="row cajaCentral">
     
    <div class="col d-flex justify-content-center text-center" >
        <table class="table info">
                <tr>
                    <th colspan="2" class="titol">DADES PERSONALS</th>
                </tr>
                <tr class="text">
                    <th> Nom </th>
                    <td>
                        {{$alum->nom}}  {{$alum->cognoms}}
                    </td>
                </tr>
                <tr class="text">
                    <th> DNI </th>
                    <td>
                        {{$alum->dni}}
                    </td>
                </tr>
                <tr class="text">
                    <th> Correu </th>
                    <td>
                        {{$alum->email}}
                    </td>
                </tr>

        </table>
    </div>

    <div>
        <table class="table table-striped table-hover">
            <tr>
                <th colspan="3" class="titol">BUTLLETÍ</th>
            </tr>

            <?php
            ?>

            @foreach ($mod as $mo)
                <?php 
                    $i = 0;
                    $j = 0;
                    $horas = 0;
                    $notatotal = 0;
                    $notaprad = 0;
                    $notauf = array();
                    $horauf = array();
                    
                ?>
                <tr >
                    <th colspan="3">{{$mo->nom}}</th>
                </tr>
                @foreach ($alum->ufs as $uf)
                <tr>
                    @if ($uf->modul->nom == $mo->nom)
                        <?php
                            $i++;
                            $horas += $uf->hores;
                            $notauf[$i] = $uf->pivot->notes;
                            $horauf[$i] = $uf->hores;
                        ?>
                        <td>{{$uf->nom}}</td>
                        <td>{{$uf->hores}} horas</td>
                        <td>{{$uf->pivot->notes}}</td>
                </tr>
                    @endif
                @endforeach
                <?php 
                    foreach($notauf as $nota) {
                        if ($nota < 5) {
                            break;
                        } else {
                            $j++;
                            $notaprad += ($horauf[$j] / $horas) * $nota;
                        }
                    }
                ?>
                <tr>
                    <th></td>
                    <th>{{$horas}} hores</td>
                    <th >
                        <?php
                            if ($notaprad == 0) {
                            } else {
                                echo(round($notaprad));
                            }
                        ?>
                    </td>
                </tr>
            @endforeach
        </table>

            <div id="pdf" class="text-right" style="margin: 10px; border-top: solid white 1px;">
                <a href="{{route('generarpdf',$alum->id)}}" >
                    <button  style="margin-top: 10px;" type="button" class="btn btn-success"> GENERAR PDF</button>
                </a>
            </div>
            <div id="enviarcorreu" class="text-right" style="margin: 10px; border-top: solid white 1px;">
                <a href="{{route('enviarcorreu',$alum->id)}}" >
                    <button  style="margin-top: 10px;" type="button" class="btn btn-success"> ENVIAR CORREU</button>
                </a>
            </div>
            <script>
                //correu
                var alertPlaceholder = document.getElementById('alert')
                var alertTrigger = document.getElementById('enviarcorreu')

                function alert(message, type) {
                    var wrapper = document.createElement('div')
                    wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

                    alertPlaceholder.append(wrapper)
                }

                if (alertTrigger) {
                    alertTrigger.addEventListener('click', function () {
                    alert('Butlletí enviat!', 'success')
                    })
                }
            </script>
        
    </div>

</div>
</div>

</body>
@stop