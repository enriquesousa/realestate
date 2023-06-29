<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class StateController extends Controller
{
    // Lista todos los estados (Entidad Federativa)
    public function AllState(){
        $state = State::latest()->get();
        return view('backend.state.all_state', compact('state'));
    }

    // AddState
    public function AddState(){
        return view('backend.state.add_state');
    }

    // StoreState Almacenar datos a la tabla 'states'
    public function StoreState(Request $request){

       // Validation
       $request->validate([
        'state_name' => 'required|max:200',
        ]);

        // Preparar imagen para guardarla
        $image = $request->file('state_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // crear un unique id para la imagen
        Image::make($image)->resize(370,275)->save('upload/state/'.$name_gen);
        $save_url = 'upload/state/'.$name_gen;

        State::insert([
            'state_name' => $request->state_name,
            'state_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Estado agregado con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification);
    }


}
