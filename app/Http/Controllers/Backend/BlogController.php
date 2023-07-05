<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BlogCategory;
use App\Models\BlogPost;

use App\Models\User;
use Intervention\Image\Facades\Image;

use Carbon\Carbon;


class BlogController extends Controller
{
    // AllBlogCategory
    public function AllBlogCategory(){
        $category = BlogCategory::latest()->get();
        return view('backend.category.blog_category', compact('category'));
    }

    // StoreBlogCategory
    public function StoreBlogCategory(Request $request){

        BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Categoría de Blog Creada con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);

    }

    // EditBlogCategory
    public function EditBlogCategory($id){

        $categories = BlogCategory::findOrFail($id);

        return response()->json($categories);
    }

    // UpdateBlogCategory
    public function UpdateBlogCategory(Request $request){

        $cat_id = $request->cat_id;

        BlogCategory::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Categoría de Blog Actualizada con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);

    }

    // DeleteBlogCategory
    public function DeleteBlogCategory($id){

        BlogCategory::findOrFail($id)->delete(); // eliminar el registro de la tabla

        $notification = array(
            'message' => 'Categoría de Blog eliminada con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /* Para CRUD de los Post en Admin */

    // AllPost
    public function AllPost(){
        $post = BlogPost::latest()->get();
        return view('backend.post.all_post', compact('post'));
    }


}
