<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    // Tomar todos los datos de la tabla property_types
    public function AllType(){

        $types = PropertyType::latest()->get();

        return view('backend.type.all_type', compact('types'));
    }

    // Anadir un Property Type
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


}
