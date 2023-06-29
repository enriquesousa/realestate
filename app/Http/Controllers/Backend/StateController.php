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

    // EditState
    public function EditState($id){
        $state = State::findOrFail($id);
        return view('backend.state.edit_state', compact('state'));
    }

    // UpdateState
    public function UpdateState(Request $request){

        $state_id = $request->id;

        // Si hay imagen la salvamos
        if ($request->file('state_image')) {

            // Preparar imagen para guardarla
            $image = $request->file('state_image');

            // dd($request->store_image); // "upload/state/1770005990852197.png"
            //regresa null si es la primera vez (si no hay foto)
            if (!empty($request->state_image)) {
                unlink(public_path($request->store_image)); // para borrar la imagen anterior
            }

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // crear un unique id para la imagen
            Image::make($image)->resize(370,275)->save('upload/state/'.$name_gen);
            $save_url = 'upload/state/'.$name_gen;

            State::findOrFail($state_id)->update([
                'state_name' => $request->state_name,
                'state_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Estado con Imagen actualizado con éxito!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.state')->with($notification);

        }else{

            State::findOrFail($state_id)->update([
                'state_name' => $request->state_name,
            ]);

            $notification = array(
                'message' => 'Estado sin Imagen actualizado con éxito!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.state')->with($notification);
        }

    }

    // DeleteState
    public function DeleteState($id){

         // Encontrar el registro en la tabla 'states' y eliminarlo con todo y foto de thumbnail
         $state = State::findOrFail($id);
         $image = $state->state_image;
         unlink($image);

         State::findOrFail($id)->delete(); // eliminar el registro de la tabla

         $notification = array(
            'message' => 'Estado eliminado con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification);
    }


}
