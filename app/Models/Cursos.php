<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    public function users() {
        return $this-> belongsToMany(User::class, 'curs_user');
    }
    
    public function moduls(){
        return $this-> hasMany(Modul::class,'id');
    }

    public function alumnes() {
        return $this-> hasMany(Alumne::class, 'id');
    }
}
