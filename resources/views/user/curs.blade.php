@extends('layouts.master')
@section('content')
<head>
<style>

  th{
      /* background-color: #1a374d; */
      text-align: center;
      color: #000000;
    }

  td{
      text-align: center;
      color: #000000;
    } 

    .htitleMod{
        margin-top: 20px;
    }


</style>
</head>
<div class="row titolar">
  <h1 class="text-end">{{$curs->nom}}</h1> 
</div>

<div class="row cajagroga" style="margin-bottom: 100px;">

    @foreach ($modul as $mod)


        <h1 style="margin-top: 30px;">MÒDUL {{$mod->nom}}</h1>
        
        <table class="table table-striped table-hover" >

            <tr>
                <th>UNITATS FORMATIVES</th>

                @foreach($mod->ufs as $uf)
                    <th colspan="2">{{$uf->nom}}</th>
                @endforeach

                <th class="align-middle" rowspan="2">% de Mòdul superat</th>
            </tr>

            <tr>
                <th>Nom</th>
                @foreach($mod->ufs as $uf)
                    <th>Hores</th>
                    <th>Nota</th>
                @endforeach
            </tr>

            <?php 
                $porcentageTotal = 0; 
                $aluTotal = 0;
                $ufsModul = count($mod->ufs)*2;
                $suspes = false;
            ?>

            @foreach($alumnes as $alumn)

                <?php 
                $calcul = 0;
                $numUfs = 0;
                $ufsApro = 0;
                $aluTotal++;
                $ufsAlu = 0;
                ?>
                <tr>
                    <th>{{$alumn->nom}} {{$alumn->cognoms}}</th>

                    @foreach($alumn->ufs->where('modul_id', $mod->id) as $uf1)

                        <?php $numUfs++; ?>

                        <td><?php $ufsAlu++?>{{$uf1->hores}}</td>

                        <?php 
                            if ($uf1->pivot->notes >= 5) {
                                $ufsApro++;
                                $suspes = true;
                            }
                        ?> 

                        <td><strong><?php $ufsAlu++?>{{$uf1->pivot->notes}}</strong></td>

                    @endforeach


                    <?php
                        if($ufsAlu<$ufsModul) {
                            $num = $ufsModul-$ufsAlu;
                            while($num>0) {
                                echo '<td></td>';
                                $num--;
                            }
                        }

                        if ($ufsApro == 0) {
                            $total = 0;
                        } else {
                            $total = ($ufsApro/$numUfs)*100;
                            $porcentageTotal += $total;
                        }
                    ?>

                    <td>{{round($total)}}%</td>
                </tr>
            @endforeach
            
            <tr>
                <?php
                    $i = $ufsModul;
                    while($i>0) {
                        echo '<th></th>';
                        $i--;
                    }    
                    $porcMedia = $porcentageTotal/$aluTotal;
                ?>
                <th>Mitja del grup</th>
                <td>{{round($porcMedia)}}%</td>
            </tr>
        </table>
    @endforeach
</div>
@stop