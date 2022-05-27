<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumne;
use App\Models\Cursos;
use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlumneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function borraralumne($id){
        DB::table('alumnes')
        ->where('id','=',$id)
        ->delete();
        return redirect()->route('alumne');
    }

    public function editalumne(Request $request,$id){
        $alumne = Alumne::find($id);
        $curs = Cursos::all();
        return view('admin.alumne.editalumne',compact('alumne','curs'));
    }

    public function updatealumne(Request $request,$id){

        $alumne = Alumne::find($id);
        $alumne->nom = $request->nom;
        $alumne->cognoms = $request->cognoms;
        $alumne->curs_id = $request->id_curs;
        $alumne->dni = $request->dni;
        $alumne->email = $request->email;
        $alumne->save();
        return redirect()->route('alumne');
        
    }

    public function createalumne(Request $request){
        $nom = $request->nom;
        $cognoms = $request->cognoms;
        $id_curs = $request->id_curs;
        $dni = $request->dni;
        $email = $request->email;
        DB::insert("INSERT INTO `alumnes` (`nom`,`cognoms`,`curs_id`,`dni`,`email`) VALUES ('$nom','$cognoms','$id_curs','$dni','$email')");
        return redirect()->route('alumne');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
