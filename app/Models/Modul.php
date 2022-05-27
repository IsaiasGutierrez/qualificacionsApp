<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    public function curso(){
        return $this->belongsTo(Cursos::class,'curs_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function alumnes() {
        return $this->belongsToMany(Alumne::class, 'alumne_id')->withPivot('notamitjana');
    }
    
    public function ufs() {
        return $this->hasMany(Uf::class,'modul_id');
    }

}
