<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Compare extends Model
{
    use HasFactory;

     // Para que todos los campos sean fillables
     protected $guarded = [];

    // Relación del campo 'property_id' con el 'id' de la tabla 'properties'
    public function property(){
        return $this->belongsTo(Property::class,'property_id','id');
    }
}
