<?php

namespace App\Models;

use App\Models\State;
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

    // Relación del campo 'state' con el 'id' de la tabla 'states', voy a usar r_ para indicar que es una relación
    public function r_estado(){
        return $this->belongsTo(State::class,'state','id');
    }

}
