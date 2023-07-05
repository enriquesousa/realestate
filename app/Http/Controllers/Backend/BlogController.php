<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BlogCategory;
use App\Models\BlogPost;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

    // AddPost
    public function AddPost(){
        $blogcat = BlogCategory::latest()->get();
        return view('backend.post.add_post', compact('blogcat'));
    }

    // StorePost
    public function StorePost(Request $request){

        // Validation
        $request->validate([
            'post_title' => 'required|max:200',
        ]);

        // Preparar imagen para guardarla
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // crear un unique id para la imagen
        Image::make($image)->resize(370, 250)->save('upload/post/' . $name_gen);
        $save_url = 'upload/post/' . $name_gen;

        BlogPost::insert([
            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'post_tags' => $request->post_tags,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Post agregado con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.post')->with($notification);
    }

}
