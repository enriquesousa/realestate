<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    // AdminAllUsers - Lista todos lso usuarios
    public function AdminAllUsers(){
        $usuarios = User::latest()->get();
        return view('backend.users.all_users', compact('usuarios'));
    }

    // AdminAddUser
    public function AdminAddUser(){
        return view('backend.users.add_user');
    }

}
