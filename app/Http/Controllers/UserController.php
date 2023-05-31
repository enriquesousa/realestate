<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){
        return view('frontend.index');
    }

    public function UserProfile(){

        // Recuperamos al user que esta login
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('frontend.dashboard.edit_profile', compact('userData'));

    }

}
