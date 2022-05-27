<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    use HasFactory;

    public function ufs() {
        return $this-> belongsToMany(Uf::class,'alumne_ufs')->withPivot('notes');
    }

    public function moduls() {
        return $this-> belongsToMany(Modul::class,'alumne_moduls')->withPivot('notamitjana');
    }

    public function cursos() {
        return $this-> belongsTo(Cursos::class,'curs_id');
    }


    
}
