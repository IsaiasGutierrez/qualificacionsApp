<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mostra()
    {
        $modulos = Modul::all();
        return view('admin.modul.modul',compact('modulos'));
    }

    public function borrarmodul($id){
        DB::table('moduls')
        ->where('id','=',$id)
        ->delete();
        return redirect()->route('modul');
    }

    public function editmodul(Request $request,$id){
        $modul = Modul::find($id);
        $cursos = Cursos::all();
        $users = User::all();
        return view('admin.modul.editmodul',compact('modul','cursos','users'));
    }

    public function updatemodul(Request $request,$id){

        $modulo = Modul::find($id);
        $modulo->nom = $request->nom;
        $modulo->hores = $request->hores;
        $modulo->curs_id = $request->id_curs;
        $modulo->users_id=$request->id_users;
        $modulo->save();
        return redirect()->route('modul');
        
    }

    public function createmodul(Request $request){
        $nom = $request->nom;
        $hores = $request->hores;
        $id_curs = $request->id_curs;
        $id_users = $request->id_users;        
        DB::insert("INSERT INTO `moduls` (`nom`,`hores`,`curs_id`,`users_id`) VALUES ('$nom','$hores','$id_curs','$id_users')");
        return redirect()->route('modul');
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
