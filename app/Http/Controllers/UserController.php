<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // User Frontend Page
    public function index(){
        return view('frontend.index');
    }

    // User Profile
    public function UserProfile(){

        // Recuperamos al user que esta login
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('frontend.dashboard.edit_profile', compact('userData'));

    }

    // User Profile Store
    public function UserProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            unlink(public_path('upload/user_images/' . $data->photo)); // para borrar la imagen anterior
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['photo'] = $filename; //Guardar a Base de Datos
        }

        $data->save();

        $notification = array(
            'message' => 'Perfil de Usuario Actualizado Correctamente',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
