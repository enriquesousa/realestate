<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyType;
use App\Models\User;

// App\Models\Property
class Property extends Model
{
    use HasFactory;

    // Para que todos los campos sean fill-ables
    protected $guarded = [];

    // Relación del campo 'ptype_id' con el 'id' de la tabla 'property_types'
    public function type(){
        return $this->belongsTo(PropertyType::class,'ptype_id','id');
    }

    // Relación del campo 'agent_id' con el 'id' de la tabla 'users'
    public function user(){
        return $this->belongsTo(User::class,'agent_id','id');
    }

}
