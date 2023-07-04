<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class TestimonialController extends Controller
{
    // AllTestimonials CRUD lista todos los testimonials
    public function AllTestimonials(){
        $testimonials = Testimonial::latest()->get();
        return view('backend.testimonials.all_testimonials', compact('testimonials'));
    }

    // AddTestimonial
    public function AddTestimonial(){
        return view('backend.testimonials.add_testimonial');
    }

    // StoreTestimonial
    public function StoreTestimonial(Request $request)
    {

        // Validation
        $request->validate([
            'name' => 'required|max:200',
        ]);


        // Preparar imagen para guardarla
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // crear un unique id para la imagen
        Image::make($image)->resize(100, 100)->save('upload/testimonials/' . $name_gen);
        $save_url = 'upload/testimonials/' . $name_gen;

        Testimonial::insert([
            'name' => $request->name,
            'position' => $request->position,
            'message' => $request->message,
            'image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Testimonial agregado con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testimonials')->with($notification);
    }

}
