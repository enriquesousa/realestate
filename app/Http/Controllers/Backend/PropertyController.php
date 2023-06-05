<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\PropertyType;
use App\Models\User;
use Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    // All Property / Todas las Propiedades
    public function AllProperty(){

        // Recuperar todos los datos de la tabla properties
        $property = Property::latest()->get();
        return view('backend.property.all_property', compact('property'));
    }

    // Añadir Propiedad
    public function AddProperty(){

        $propertytype = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

        return view('backend.property.add_property',compact('propertytype','amenities','activeAgent'));
    }

    // Store Property
    public function StoreProperty(Request $request){

        $image = $request->file('property_thambnail');
        // crear un unique id para la imagen
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(370,250)->save('upload/property/thambnail/'.$name_gen);
        $save_url = 'upload/property/thambnail/'.$name_gen;


    }

}
