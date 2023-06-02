<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;

class PropertyController extends Controller
{
    // All Property / Todas las Propiedades
    public function AllProperty(){

        // Recuperar todos los datos de la tabla properties
        $property = Property::latest()->get();
        return view('backend.property.all_property', compact('property'));
    }

}
