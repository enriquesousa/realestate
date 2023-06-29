<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    // Lista todos los estados (Entidad Federativa)
    public function AllState(){
        $state = State::latest()->get();
        return view('backend.state.all_state', compact('state'));
    }


}
