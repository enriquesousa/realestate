<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPost;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relación del campo 'post_id' con el 'id' de la tabla 'blog_posts'
    public function post(){
       return $this->belongsTo(BlogPost::class,'post_id','id');
    }

    // Relación del campo 'user_id' con el 'id' de la tabla 'users'
    public function user(){
       return $this->belongsTo(User::class,'user_id','id');
    }

}
