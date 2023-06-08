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
