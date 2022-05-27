<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alumne;
use App\Models\AlumneUf;
use App\Models\Curs;
use App\Models\Cursos;
use App\Models\Modul;
use App\Models\Uf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role_id == 0) {
            return view('admin.index');
        }
        
        if (auth()->user()->role_id == 1) {
            //dump(auth()->user());
            $user = auth()->user();
            $moduls = $user->moduls;
            //$modulos = Modul::all();
            //$user = User::find(1);
            return view('user.moduls',compact('user'));
        }

    }



    
    public function alumnesModul($id) {
        $alumnes = DB::table('alumnes')
        ->where('curs_id','=',$id)
        ->get();
        return view('user.alumnes',compact('alumnes'));
    }

    public function notes($id, $curs_id) {
    
        $uf = Uf::
        where('modul_id','=',$id)
        ->get();
        $alumne = Alumne::
        where('curs_id','=',$curs_id)
        ->get();
        $aa = DB::table('ufs')
        ->where('modul_id','=',$id)
        ->count();

        $idmodul =$id;
        $idcurs = $curs_id;
        return view('user.alumnes',compact('alumne','uf','aa','idmodul','idcurs'));
    }



    public function todasnotas($id) {

        $alu = DB::table("alumnes")
        ->where("id","=", $id)
        ->first();

        $alum = Alumne::find($id);

        $mod = DB::table('moduls')->where('curs_id', $alum->curs_id)->get();

        return view('user.mostraalu',compact('alu', 'alum', 'mod'));
    }

    public function asignarnotes(Request $request,$id,$curs_id,$modul_id){
        $a=0;
        $x=0;   
        foreach ($request->notes as $uf => $nota){
            $pra = DB::table('alumne_ufs')
            ->where('alumne_id','=',$id)
            ->where('uf_id','=',$uf)
            ->first();
            if (isset($pra)) {
                $notaalu = AlumneUf::find($pra->id);
                $notaalu->alumne_id = $id;
                $notaalu->uf_id = $uf;
                $notaalu->notes = $nota; 
                $notaalu->comentaris = $request->comentaris;
                $notaalu ->save();
            } else {
                $notaalu = new AlumneUf;
                $notaalu->alumne_id = $id;
                $notaalu->uf_id = $uf;
                $notaalu->notes = $nota; 
                $notaalu->comentaris = $request->comentaris;
                $notaalu ->save(); 
            }
            $a += $nota;
            $x++;
        }
        dump($a/$x);
        return redirect()->route('alumnesModul',['id'=>$modul_id,'curs_id'=>$curs_id]);
    }

    public function hacerpdf($id)
    {
        $alu = DB::table("alumnes")
        ->where("id","=", $id)
        ->first();

        $alumne = Alumne::find($id);

        $modul = DB::table('moduls')->where('curs_id', $alumne->curs_id)->get();

        $data = compact('alu', 'alumne', 'modul');

        $pdf = \PDF::loadView('user.pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('notas' . $alumne->nom . $alumne->cognoms . '.pdf');


    }

    public function cursresum($id) {
        $curs = Cursos::find($id);
        $modul = Modul::where('curs_id',$id)->get();
        $alumnes = Alumne::where('curs_id',$id)->get();

        return view('user.curs', compact('curs','modul','alumnes'));
    }

    public function enviarcorreu($id) {

        $data["email"] = "mmoreno@inscamidemar.cat";
        $data["title"] = "Ins Camí de Mar";
        $data["body"] = "This is Demo";

        $alu = DB::table("alumnes")
        ->where("id","=", $id)
        ->first();

        $aluid = $id;

        $alumne = Alumne::find($id);

        $modul = DB::table('moduls')->where('curs_id', $alumne->curs_id)->get();

        $dataa = compact('alu', 'alumne', 'modul');

        $pdf = \PDF::loadView('user.pdf', $dataa)->setOptions(['defaultFont' => 'sans-serif']);

        Mail::send('email.butlletiemail', $dataa, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });


        return redirect()->route('todasnotas', $aluid);
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
