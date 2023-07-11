<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Property;


class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relación del campo 'user_id' con el 'id' de la tabla 'users'
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    // Relación del campo 'property_id' con el 'id' de la tabla 'properties'
    public function property(){
        return $this->belongsTo(Property::class,'property_id','id');
    }

}
