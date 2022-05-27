<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Uf extends Model
{
    use HasFactory;

    public function alumnes() {
        return $this-> belongsToMany(Alumne::class, 'alumne_uf')->withPivot('notes');
    }

    public function modul() {
        return $this->belongsTo(Modul::class,'modul_id');
    }

    public function alumneufs() {
        return $this->hasMany(AlumneUf::class,'id');
    }
    
}
