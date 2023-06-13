<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePlan extends Model
{
    use HasFactory;

    // Para que todos los campos sean fillables
    protected $guarded = [];

    // Relación del campo 'user_id' con el 'id' de la tabla 'users'
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
