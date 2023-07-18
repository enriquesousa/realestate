<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Schedule;
use Illuminate\Validation\Rule;


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

        $request->validate([

            'username' => [
                Rule::unique('users')->ignore(User::findOrFail($id)->id),
            ],

        ]);


        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');

            // dd($data->photo); //regresa null si es la primera vez (si no hay foto)
            if (!empty($data->photo)) {
                unlink(public_path('upload/user_images/' . $data->photo)); // para borrar la imagen anterior
            }

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

    // User Logout
    public function UserLogout(Request $request)
    {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Cierre de Sesión Exitosa',
            'alert-type' => 'success'
        );

        // return redirect('/login')->with($notification);
        return redirect(route('casa'))->with($notification);

    }

    // User Change Password
    public function UserChangePassword()
    {

        return view('frontend.dashboard.change_password');

    }

     // User Update Password
     public function UserPasswordUpdate(Request $request)
     {

         // Validation
         $request->validate([

             'old_password' => 'required',
             'new_password' => 'required|confirmed'

         ]);


         // Match The Old Password
         if (!Hash::check($request->old_password, auth::user()->password)) {
             $notification = array(
                 'message' => 'Contraseña Vieja NO coincide!',
                 'alert-type' => 'error'
             );
             return back()->with($notification);
         }

         // Update The New Password
         User::whereId(auth()->user()->id)->update([
             'password' => Hash::make($request->new_password)
         ]);

         $notification = array(
             'message' => 'La Contraseña se ha actualizado con éxito!',
             'alert-type' => 'success'
         );

         return back()->with($notification);

     }

     /*********
     * Frontend
     **********/

    //  Ver todas las categorías
     public function CategoryAll(){
        return view('frontend.home.category_todas');
     }

     // UserScheduleRequest
     public function UserScheduleRequest(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        $citas_user = Schedule::where('user_id', $id)->get();

        return view('frontend.message.schedule_request', compact('userData','citas_user'));

     }

}
