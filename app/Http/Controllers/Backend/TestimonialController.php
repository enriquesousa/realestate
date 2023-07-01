<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // AllTestimonials CRUD lista todos los testimonials
    public function AllTestimonials(){
        $testimonials = Testimonial::latest()->get();
        return view('backend.testimonials.all_testimonials', compact('testimonials'));
    }
}
