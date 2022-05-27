<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use App\Models\Curs;
use App\Models\Cursos;
use App\Models\Uf;
use App\Models\User;
use Illuminate\Http\Request;

class RelacionController extends Controller
{
    //
    public function notes() {
        $alumne = Alumne::find(1);
        $curs = Cursos::find(2);

        return view('user.alumnes',compact('alumne','curs'));
    }

    public function profes() {
        $curs = Cursos::find(1);
        $usuari = User::find(2);

        return view('profes',compact('curs','user'));
    }

}
