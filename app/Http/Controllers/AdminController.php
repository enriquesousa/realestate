<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\TopbarData;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{

    /******
    * Admin
    *******/

    // Admin Dashboard
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    // Admin Logout
    public function AdminLogout(Request $request)
    {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Cierre de Sesión Exitosa',
            'alert-type' => 'success'
        );

        // return redirect('/admin/login')->with($notification);
        return redirect('/')->with($notification);

    }

    // Admin Login
    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    // Admin Profile
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    // Admin Profile Store
    public function AdminProfileStore(Request $request)
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

            // dd($data->photo); //regresa null si es la primera vez (si no hay foto)
            if (!empty($data->photo)) {
                unlink(public_path('upload/admin_images/' . $data->photo)); // para borrar la imagen anterior
            }

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename; //Guardar a Base de Datos
        }

        $data->save();

        $notification = array(
            'message' => 'Perfil de Admin Actualizado Correctamente',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

     // AdminTopbarStore para almacenar datos a tabla topbar_data
     public function AdminTopbarStore(Request $request)
     {

         $data = TopbarData::find(1);

         $data->address = $request->address;
         $data->horario = $request->horario;
         $data->phone = $request->phone;
         $data->save();

         $notification = array(
             'message' => 'Datos de Top Bar Actualizado!',
             'alert-type' => 'success'
         );

         return redirect()->back()->with($notification);
     }

    // Admin Change Password
    public function AdminChangePassword()
    {

        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_change_password', compact('profileData'));

    }

    // Admin Update Password
    public function AdminUpdatePassword(Request $request)
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

    // AdminDocs Ver Documentación del sistema
    public function AdminDocs(){
       return view('backend.pages.docs.documentacion');
    }


    /******
    * Agent
    *******/

    // Desplegar todos los Agentes
    public function AllAgent(){
        $allAgents = User::where('role','agent')->get();
        return view('backend.agentuser.all_agent',  compact('allAgents'));
    }

    // Añadir Agente
    public function AddAgent(){
        return view('backend.agentuser.add_agent');
    }

    // Almacenar Agent a Base de Datos
    public function StoreAgent(Request $request){
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'agent',
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Agente Creado con éxito!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.agent')->with($notification);
    }

    // Edit Agent
    public function EditAgent($id){
        $allAgents = User::findOrFail($id);
        return view('backend.agentuser.edit_agent',  compact('allAgents'));
    }

    // Update Agent
    public function UpdateAgent(Request $request){
        $user_id = $request->id;

        User::findOrFail($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Agente Actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.agent')->with($notification);
    }

    // Delete Agent
    public function DeleteAgent($id){
        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Agente Eliminado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Para cambiar el status de Agent desde el toggle JS en resources/views/backend/agentuser/all_agent.blade.php
    public function changeStatus(Request $request){
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        // return response()->json(['success' => 'Estatus Cambio con Éxito']);
        return response()->json(['success' => $user->status]);
    }


    /***********************************
    * Configuración de Administradores
    ***********************************/

    // AllAdmin - Desplegar todos los Administradores
    public function AllAdmin(){
        $allAdmin = User::where('role','admin')->get();
        return view('backend.pages.admin.all_admin',  compact('allAdmin'));
    }

    // AddAdmin
    public function AddAdmin(){
        $roles = Role::all();
        return view('backend.pages.admin.add_admin', compact('roles'));
    }

    // StoreAdmin
    public function StoreAdmin(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        // para poder asignarle un rol a este usuarios en tabla 'model_has_roles'
        // usamos un método de spatie
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Nuevo Admin Agregado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);

    }

    // EditAdmin
    public function EditAdmin($id){

        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('backend.pages.admin.edit_admin', compact('user', 'roles'));

    }

    // UpdateAdmin
    public function UpdateAdmin(Request $request, $id){

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        // $user->roles()->detach(); método de spatie.
        // para poder borrar primero los datos en tabla 'model_has_roles'
        $user->roles()->detach();

        // Ya podemos asignarle un rol a este usuarios en tabla 'model_has_roles'
        // usamos un método de spatie
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin Actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);

    }

    // DeleteAdmin
    public function DeleteAdmin($id){

        $user = User::findOrFail($id);

        // si hay datos, eliminar
        // al usar $user->delete() spatie automáticamente elimina el rol en tabla 'model_has_roles'
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Admin Eliminado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


}
