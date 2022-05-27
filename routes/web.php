<?php

use App\Http\Controllers\Admin\AlumneController;
use App\Http\Controllers\Admin\CursController;
use App\Http\Controllers\Admin\ModulController;
use App\Http\Controllers\Admin\UfController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ModulController as ControllersModulController;
use App\Http\Controllers\RelacionController;
use App\Http\Controllers\User\UserController;
use App\Models\Alumne;
use App\Models\Cursos;
use App\Models\Modul;
use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {

        Route::group(['middleware' => 'role:user', 'prefix' => 'user', 'as' => 'user.'], function() {
        Route::resource('user', \App\Http\Controllers\User\UserController::class);
            
    });

    // Comprova si és la primera vegada que inicia sessió    
    Route::get('/home',function(){
        
        if (auth()->user()->role_id == 0) {
            if (auth()->user()->NuevaPassword == 0) {
                $usu = auth()->user();
                return view('nuevouspas',compact('usu'));
            } else{
                return view('admin.index');
            }
        }
            
        if (auth()->user()->role_id == 1) {
            if (auth()->user()->NuevaPassword == 0) {
                $usu = auth()->user();
                return view('nuevouspas',compact('usu'));
            }else{
            //dump(auth()->user());
            $user = auth()->user();
            $moduls = $user->moduls;
            //$modulos = Modul::all();
            //$user = User::find(1);
            return view('user.moduls',compact('user'));
            }
        }
    })->name('redirect');

    // Vista per canviar la contrasenya
    Route::get('/nuevapass/{id}',function (Request $request,$id){
        $usu = User::find($id);
        $usu->password = Hash::make($request->contra);
        $usu->NuevaPassword = 1;
        $usu->save();
        return redirect()->route('redirect');

    })->name('Nuevapass');

    // rutes per user
        Route::get('/user/user/alumnes/asignarnota/{id}/{curs_id}/{modul_id}',[UserController::class,'asignarnotes'])-> middleware(['middleware' => 'role:user'])->name('asignarnotes');

        Route::get('/user/user/uf/{id}/{curs_id}',[UserController::class,'notes'])-> middleware(['middleware' => 'role:user'])->name('alumnesModul');

        Route::get('/user/user/mostrarnotas/{id}',[UserController::class,'todasnotas'])-> middleware(['middleware' => 'role:user'])->name('todasnotas');

        Route::get('/user/generarpdf/{id}', [UserController::class, 'hacerpdf'])-> middleware(['middleware' => 'role:user'])->name('generarpdf');

        Route::get('/user/enviarcorreu/{id}', [UserController::class, 'enviarcorreu'])->middleware(['middleware'=> 'role:user'])->name('enviarcorreu');

        Route::get('/user/cursresum/{id}', [UserController::class, 'cursresum'])-> middleware(['middleware' => 'role:user'])->name('cursresum');





    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('admin', \App\Http\Controllers\Admin\AdminController::class);
    });

    //modul
        Route::get('admin/modul',[ModulController::class,'mostra'])-> middleware(['middleware' => 'role:admin'])->name('modul');

        Route::get('admin/modul/borrar/{id}',[ModulController::class,'borrarmodul'])-> middleware(['middleware' => 'role:admin'])->name('deletemodul');

        Route::get('admin/modul/edit/{id}',[ModulController::class,'editmodul'])-> middleware(['middleware' => 'role:admin'])->name('editmodul');

        Route::put('admin/modul/update/{id}',[ModulController::class,'updatemodul'])-> middleware(['middleware' => 'role:admin'])->name('updatemodul');

        Route::get('admin/modul/crear',function () {
            $curs = DB::table('cursos')->get();
            $cursos = DB::table('cursos')->get();
            $users = DB::table('users')->get();
            return view('admin.modul.crearmodul', ['curs' => $curs,'cursos' =>$cursos, 'users' =>$users]);
        })-> middleware(['middleware' => 'role:admin'])->name('crearmodul');

        Route::put('admin/modul/crear/nou',[ModulController::class,'createmodul'])-> middleware(['middleware' => 'role:admin'])->name('crearmodul2');


    //curs
        Route::get('admin/curs',function () {
            $cursos = DB::table('cursos')->get();
            return view('admin.curs.cursos', ['cursos' => $cursos]);
        })-> middleware(['middleware' => 'role:admin'])->name('curs');

        Route::get('admin/curs/borrar/{id}',[CursController::class,'borrarcurs'])-> middleware(['middleware' => 'role:admin'])->name('borrarcurs');

        Route::get('admin/curs/edit/{id}',[CursController::class,'editcurs'])-> middleware(['middleware' => 'role:admin'])->name('editcurs');

        Route::put('admin/curs/update/{id}',[CursController::class,'updatecurs'])-> middleware(['middleware' => 'role:admin'])->name('updatecurs');

        Route::get('admin/curs/crear',function () {
            return view('admin.curs.creacurso');
        })-> middleware(['middleware' => 'role:admin'])->name('crearcurs');

        Route::put('admin/curs/crear/nou',[CursController::class,'createcurs'])-> middleware(['middleware' => 'role:admin'])->name('crearcurs2');


    //user
        Route::get('admin/user', function () {
            $users= User::all();
            return view('admin.user.user',compact('users'));
        })-> middleware(['middleware' => 'role:admin'])->name('user');

        Route::get('admin/user/borrar/{id}',[AdminUserController::class,'borraruser'])-> middleware(['middleware' => 'role:admin'])->name('deleteusu');

        Route::get('admin/user/edit/{id}',[AdminUserController::class,'edituser'])-> middleware(['middleware' => 'role:admin'])->name('editusu');

        Route::put('admin/user/update/{id}',[AdminUserController::class,'updateuser'])-> middleware(['middleware' => 'role:admin'])->name('updateuser');

        Route::get('admin/user/crear',function () {
            $curs = Cursos::all();
            $user = User::all();
            return view('admin.user.creauser', compact('curs','user'));
        })-> middleware(['middleware' => 'role:admin'])->name('crearusu');

        Route::put('admin/user/crear/nou',[AdminUserController::class,'createuser'])-> middleware(['middleware' => 'role:admin'])->name('crearuser2');


    //Alumne
        Route::get('admin/alumne',function () {
            $alumnes = Alumne::all();
            return view('admin.alumne.alumne',compact('alumnes'));
        })-> middleware(['middleware' => 'role:admin'])->name('alumne');

        Route::get('admin/alumne/borrar/{id}',[AlumneController::class,'borraralumne'])-> middleware(['middleware' => 'role:admin'])->name('deletealumne');

        Route::get('admin/alumne/edit/{id}',[AlumneController::class,'editalumne'])-> middleware(['middleware' => 'role:admin'])->name('editalumne');

        Route::put('admin/alumne/update/{id}',[AlumneController::class,'updatealumne'])-> middleware(['middleware' => 'role:admin'])->name('updatealumne');

        Route::get('admin/alumne/crear',function () {
            $curs = Cursos::all();
            $alumnes = Alumne::all();
            return view('admin.alumne.creaalumne', compact('curs','alumnes'));
        })-> middleware(['middleware' => 'role:admin'])->name('crearalumne');

        Route::put('admin/alumne/crear/nou',[AlumneController::class,'createalumne'])-> middleware(['middleware' => 'role:admin'])->name('crearalumne2');


    //uf
        Route::get('admin/uf', function () {
            $ufs = Uf::all();
            return view('admin.uf.uf',compact('ufs'));
        })-> middleware(['middleware' => 'role:admin'])->name('uf');

        Route::get('admin/uf/borrar/{id}',[UfController::class,'borraruf'])-> middleware(['middleware' => 'role:admin'])->name('deleteuf');

        Route::get('admin/uf/edit/{id}',[UfController::class,'edituf'])-> middleware(['middleware' => 'role:admin'])->name('edituf');

        Route::put('admin/uf/update/{id}',[UfController::class,'updateuf'])-> middleware(['middleware' => 'role:admin'])->name('updateuf');

        Route::get('admin/uf/crear',function () {
            $moduls = Modul::all();
            return view('admin.uf.creauf', compact('moduls'));
        })-> middleware(['middleware' => 'role:admin'])->name('crearuf');

        Route::put('admin/uf/crear/nou',[UfController::class,'createuf'])-> middleware(['middleware' => 'role:admin'])->name('crearuf2');

        Route::get('send-mail', function () {

            $details = [
                'title' => 'Mail from ItSolutionStuff.com',
                'body' => 'This is for testing email using smtp'
            ];
            \Mail::to('igutierre@inscamidemar.cat')->send(new \App\Mail\MyTestMail($details));
            dd("Email is Sent.");
        });

});