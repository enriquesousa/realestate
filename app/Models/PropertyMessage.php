<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
use App\Models\User;

class PropertyMessage extends Model
{
    use HasFactory;

    // Para que todos los campos sean fillables
    protected $guarded = [];

    // Relación del campo 'property_id' con el 'id' de tabla 'properties'
    public function property(){
        return $this->belongsTo(Property::class,'property_id','id');
    }

    // Relación del campo 'user_id' con el 'id' de tabla 'users'
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
