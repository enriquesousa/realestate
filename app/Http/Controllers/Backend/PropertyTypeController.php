<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\Amenities;

class PropertyTypeController extends Controller
{
    /*
    ***** Property Type todos los metodos / Tipos de Propiedad *****
    */

    // Tomar todos los datos de la tabla property_types
    public function AllType(){

        $types = PropertyType::latest()->get();

        return view('backend.type.all_type', compact('types'));
    }

    // Añadir un Property Type
    public function AddType(){

        return view('backend.type.add_type');
    }

    // Store Type a tabla property_types
    public function StoreType(Request $request){

        // Validation
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Type Creada con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    }

    // Edit Type
    public function EditType($id){

        $types = PropertyType::findOrFail($id);

        return view('backend.type.edit_type', compact('types'));
    }

    // Update Type
    public function UpdateType(Request $request){

        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Type se actualizo con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    }

    // Delete Type
    public function DeleteType($id){

        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Type se elimino con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    /*
    ***** Amenities todos los metodos *****
    */

    // All Amenities / Comodidades
    public function AllAmenities(){

        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    }

    // Añadir AddAmenities
    public function AddAmenities(){
        return view('backend.amenities.add_amenities');
    }

    // Store Amenities
    public function StoreAmenities(Request $request){

        Amenities::insert([
            'amenities_name' => $request->amenities_name,
        ]);

        $notification = array(
            'message' => 'Nuevo Amenities Creada con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    }

    // Edit Amenities
    public function EditAmenities($id){

        $amenities = Amenities::findOrFail($id);

        return view('backend.amenities.edit_amenities', compact('amenities'));
    }

     // Update Amenities
     public function UpdateAmenities(Request $request){

        $ame_id = $request->id;

        Amenities::findOrFail($ame_id)->update([
            'amenities_name' => $request->amenities_name,
        ]);

        $notification = array(
            'message' => 'El campo amenities se actualizo con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);

    }

     // Delete Amenities
     public function DeleteAmenities($id){

        Amenities::findOrFail($id)->delete();

        $notification = array(
            'message' => 'El registro se elimino con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


}
