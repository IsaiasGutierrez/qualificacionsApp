<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notas extends Model
{
    use HasFactory;
    use User;

    $user = User::find(1);

    foreach ($user->roles as $role) {
        
    }
    
}
