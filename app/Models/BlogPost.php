<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;
use App\Models\User;


class BlogPost extends Model
{
    use HasFactory;
    protected $guarded = [];

     // Relación del campo 'blogcat_id' con el 'id' de tabla 'blog_categories'
     public function cat(){
        return $this->belongsTo(BlogCategory::class,'blogcat_id','id');
    }

    // Relación del campo 'user_id' con el 'id' de la tabla 'users'
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
