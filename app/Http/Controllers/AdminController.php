<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    // Admin Dashboard
    public function AdminDashboard(){
        return view('admin.index');
    }

    // Admin Logout
    public function AdminLogout(Request $request){

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');

    }

    // Admin Login
    public function AdminLogin(){
        return view('admin.admin_login');
    }

    // Admin Profile
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    // Admin Profile Store
    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename; //Guardar a Base de Datos
        }

        $data->save();

        return redirect()->back();
    }

}
