<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOTAS</title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Ubuntu:wght@300&display=swap');
        body{
          font-family: 'Montserrat', sans-serif;
            
        }

        th {
            color: black !important;
        }

        table, th, tr, td{
            border-collapse: collapse;
            border:0px solid black;
            text-align: start;
        }


        table{
            margin-bottom: 3%;
            
        }

        h1{
            border-bottom: 1px solid rgb(46, 46, 46);
        }

        .table-info td, .table-info th{
            width: 300px;
            padding: 20px;
        }

        .quali td, .quali th{
            width: 200px;
            padding: 15px;
        }

        td, th, .per{
            text-align: start;
        }

        table{
            width: 100%;
        }

        .nommod{
            margin-top: 50px;
            padding-top: 50px;
        }

        .impar {
            background-color: #f2f2f2;
        }

        .table-info .text .per {
            border-right-color: #f2f2f2;
            text-align: start;
        }

        .quali .finMod {
            padding-bottom: 40px;
        }

        .table-info .per {
            text-align: left;
            padding-left: 45%;
        }

        .quali .middle {
            text-align: center;
        }

    </style>
</head>
<body>

    <h1>{{$alu->nom}} {{ $alu->cognoms }}</h1>



    <table class="table-info">
        <tr>
            <th colspan="2" class="titol"><h2>Dades personals</h2></th>
        </tr>
        <tr class="text impar">
            <th class="per"> Nom </th>
            <td>
            {{$alu->nom}}  {{$alu->cognoms}}
            </td>
        </tr>
        <tr class="text par">
            <th class="per"> DNI </th>
            <td>
                {{$alu->dni}}
            </td>
        </tr>
        <tr class="text impar">
            <th class="per"> Correu </th>
            <td>
                {{$alu->email}}
            </td>
        </tr>
    </table>

    <table class="quali">
        <tr>
            <th colspan="3" class="titol"><h2>Butlletí</h2></th>
        </tr>

        @foreach ($modul as $mod)
            <?php 
            $i = 0;
            $j = 0;
            $horas = 0;
            $notatotal = 0;
            $notaprad = 0;
            $notauf = array();
            $horauf = array();

            ?>
            <tr class="nommod impar">
                <th class="nommod" colspan="3">{{$mod->nom}}</th>
            </tr>

            @foreach ($alumne->ufs as $uf)
                
                @if ($uf->modul->nom == $mod->nom)
                    <tr class="par">
                        <?php
                        $i++;
                        $horas += $uf->hores;
                        $notauf[$i] = $uf->pivot->notes;
                        $horauf[$i] = $uf->hores;
                        ?>

                        <td>{{$uf->nom}}</td>
                        <td class="middle">{{$uf->hores}} hores</td>
                        <td class="middle">{{$uf->pivot->notes}}</td>
                    </tr>
                @endif
            @endforeach

            <?php 
            foreach($notauf as $not) {
                if ($not < 5) {
                    break;
                } else {
                    $j++;
                    $notaprad += ($horauf[$j] / $horas) * $not;
                }
            }
            ?>
            <tr class="tothores">
                <th class="finMod"></td>
                <th class="finMod">{{$horas}} hores</td>
                <th class="finMod">
                <?php
                if ($notaprad == 0) {
                } else {
                    echo(round($notaprad));
                }
                ?>
                </td>
            </tr>
            {{-- <tr>
                <td>Comentaris</td>
                @foreach ($coment as $co)
                    <td><span>{{$co->comentaris}}</span></td>
                @endforeach
                

            </tr> --}}
        @endforeach
        
    </table>
</body>
</html>
