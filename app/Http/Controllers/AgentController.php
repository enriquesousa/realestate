<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;


class AgentController extends Controller
{
    // Agent Dashboard
    public function AgentDashboard(){
        return view('agent.index');
    }

    // Agent Login
    public function AgentLogin(){
        return view('agent.agent_login');
    }

    // Agent Logout
    public function AgentLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Agente Cierre de Sesión Exitosa',
            'alert-type' => 'success'
        );

        return redirect('/agent/login')->with($notification);
    }

    // Registro de Agent
    public function AgentRegister(Request $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'agent',
            'status' => 'inactive',
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::AGENT);
    }

    // Agent Profile
    public function AgentProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('agent.agent_profile_view', compact('profileData'));
    }

    // Agent Profile Store
    public function AgentProfileStore(Request $request)
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
                unlink(public_path('upload/agent_images/' . $data->photo)); // para borrar la imagen anterior
            }

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/agent_images'), $filename);
            $data['photo'] = $filename; //Guardar a Base de Datos
        }

        $data->save();

        $notification = array(
            'message' => 'Perfil de Agente Actualizado Correctamente',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
