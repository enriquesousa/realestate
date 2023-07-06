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

    // EditTestimonial
    public function EditTestimonial($id){
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonials.edit_testimonial', compact('testimonial'));
    }

    // UpdateTestimonial
    public function UpdateTestimonial(Request $request){

        $testimonial_id = $request->id;

        // Si hay imagen nueva la salvamos
        if ($request->file('image')) {

            // Preparar la nueva imagen imagen para guardarla
            $image = $request->file('image');

            //dd($request->image_original, $image); // "upload/testimonials/pt1.jpg" y $image="62.png" la nueva imagen

            // No permitir modificar la foto de estas tres fotos (porque las necesita el TestimonialsTableSeeder)
            $oi = $request->image_original;
            $op1 = "upload/testimonials/pt1.jpg";
            $op2 = "upload/testimonials/pt2.jpg";
            $op3 = "upload/testimonials/pt3.jpg";
            if ( $oi == $op1 || $oi == $op2 || $oi == $op3) {

                Testimonial::findOrFail($testimonial_id)->update([
                    'name' => $request->name,
                    'position' => $request->position,
                    'message' => $request->message,
                ]);

                $notification = array(
                    'message' => 'No se permite modificar esta imagen!, Testimonial actualizado con éxito!',
                    'alert-type' => 'success'
                );

            } else {

                //regresa null si es la primera vez (si no hay foto)
                if (!empty($request->image_original)) {
                    unlink(public_path($request->image_original)); // para borrar la imagen anterior
                }

                // Preparar imagen para guardarla
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // crear un unique id para la imagen
                Image::make($image)->resize(100, 100)->save('upload/testimonials/' . $name_gen);
                $save_url = 'upload/testimonials/' . $name_gen;

                Testimonial::findOrFail($testimonial_id)->update([
                    'name' => $request->name,
                    'position' => $request->position,
                    'message' => $request->message,
                    'image' => $save_url,
                ]);

                $notification = array(
                    'message' => 'Testimonial actualizado con éxito!',
                    'alert-type' => 'success'
                );

            }

            return redirect()->route('all.testimonials')->with($notification);

        }else{

            Testimonial::findOrFail($testimonial_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
            ]);

            $notification = array(
                'message' => 'Testimonial actualizado con éxito!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.testimonials')->with($notification);
        }
    }

    // DeleteTestimonial
    public function DeleteTestimonial($id){

        $testimonial = Testimonial::findOrFail($id);
        $image = $testimonial->image;
        unlink($image);

        Testimonial::findOrFail($id)->delete(); // eliminar el registro de la tabla

        $notification = array(
           'message' => 'Testimonio eliminado con éxito!',
           'alert-type' => 'success'
       );

       return redirect()->route('all.testimonials')->with($notification);

    }

}
