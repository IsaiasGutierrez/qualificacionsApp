<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function borraruser($id){
        DB::table('users')
        ->where('id','=',$id)
        ->delete();
        return redirect()->route('user');
    }

    public function edituser(Request $request,$id){
        $user = User::find($id);
        $curs = Cursos::all();
        return view('admin.user.edituser',compact('user','curs'));
    }

    public function createuser(Request $request){
        $nom = $request->nom;
        $email = $request->email;
        $password = Hash::make($request->password);
        $admin = $request->admin;
    
        DB::insert("INSERT INTO `users` (`name`,`email`,`password`,`role_id`) VALUES ('$nom','$email','$password','$admin')");
        return redirect()->route('user');
    }

    public function updateuser(Request $request,$id){

        $user = User::find($id);
        $passhash = Hash::make($request->password);
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->password = $passhash;
        $user->role_id = $request->admin;
        $user->save();
        return redirect()->route('user');
        
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
