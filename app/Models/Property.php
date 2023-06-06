<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyType;

class Property extends Model
{
    use HasFactory;

    // Para que todos los campos sean fill-ables
    protected $guarded = [];

    // Relacion del campo 'ptype_id' con el 'id' de la tabla 'property_types'
    public function type(){
        return $this->belongsTo(PropertyType::class,'ptype_id','id');
    }
}
