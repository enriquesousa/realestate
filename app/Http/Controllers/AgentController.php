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

}
