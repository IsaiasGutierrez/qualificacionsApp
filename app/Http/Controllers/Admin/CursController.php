<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function borrarcurs($id){
        DB::table('cursos')
        ->where('id','=',$id)
        ->delete();
        return redirect()->route('curs');
    }

    public function editcurs($id){
        $curso = Cursos::find($id);
        $curs = $id;
        $cursos = DB::table('cursos')
        ->where('id',$id)
        ->get();
        return view('admin.curs.editcurs',compact('curs','id','cursos', 'curso'));
    }

    public function updatecurs(Request $request,$id){
        DB::table('cursos')
        ->where('id','=',$id)
        ->update(['nom' => $request->nom]);
        return redirect()->route('curs');
    }

    public function createcurs(Request $request){
        $nom = $request->nom;
        
        DB::insert("INSERT INTO `cursos` (`nom`) VALUES ('$nom')");
        return redirect()->route('curs');

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
