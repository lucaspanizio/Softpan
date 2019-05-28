<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerUser extends Controller
{
    public function login() {
        return view('auth.login');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = User::all();        
        return view('layouts.register.user', compact('usuarios'));
    }


}
