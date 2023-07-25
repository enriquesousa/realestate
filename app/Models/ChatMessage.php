<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relación del campo 'sender_id' con el 'id' de tabla 'users'
    public function sender(){
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    // Relación del campo 'receiver_id' con el 'id' de tabla 'users'
    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

}
