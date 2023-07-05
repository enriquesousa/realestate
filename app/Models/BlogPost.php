<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;

class BlogPost extends Model
{
    use HasFactory;
    protected $guarded = [];

     // Relación del campo 'blogcat_id' con el 'id' de tabla 'blog_categories'
     public function cat(){
        return $this->belongsTo(BlogCategory::class,'blogcat_id','id');
    }

}
