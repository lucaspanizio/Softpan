<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerUser extends Controller
{
    public function login()
    {
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


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->role = $request->input('role');
        $usuario->situation = $request->input('situation');
        $usuario->save();

        return redirect()->route('admin.user.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        $usuario = User::find($request->id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if (!empty($request->password)){
            if($request->password == $request->password_confirmation)
                $usuario->password = $request->password;
        }            
            
        $usuario->role = $request->role;
        $usuario->situation = $request->situation;
        $usuario->save();

        return redirect()->route('admin.user.index');
    }

    public function destroy(Request $request) {
        $usuario = User::find($request->id);
        $usuario->delete();

        return redirect()->route('admin.user.index');

    }
}
