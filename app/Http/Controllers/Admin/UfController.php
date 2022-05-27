<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\Modul;
use App\Models\Uf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function borraruf($id){
        DB::table('ufs')
        ->where('id','=',$id)
        ->delete();
        return redirect()->route('uf');
    }

    public function edituf(Request $request,$id){
        $uf = Uf::find($id);
        $moduls = Modul::all();
        return view('admin.uf.edituf',compact('uf','moduls'));
    }

    public function updateuf(Request $request,$id){

        $uf = Uf::find($id);
        $uf->nom = $request->nom;
        $uf->hores = $request->hores;
        $uf->modul_id = $request->id_modul;
        $uf->save();
        return redirect()->route('uf');
        
    }

    public function createuf(Request $request){
        $nom = $request->nom;
        $hores = $request->hores;
        $id_modul = $request->id_modul;
        DB::insert("INSERT INTO `ufs` (`nom`,`hores`,`modul_id`) VALUES ('$nom','$hores','$id_modul')");
        return redirect()->route('uf');
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