<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Models\Company;
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
        $users = User::all();
        $companies = Company::all();
        return view('layouts.register.user', compact('users', 'companies'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->situation = $request->input('situation');
        $user->save();

        return redirect()->route('admin.user.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)){
            if($request->password == $request->password_confirmation)
                $user->password = $request->password;
        }            
            
        $user->role = $request->role;
        $user->situation = $request->situation;
        $user->save();

        return redirect()->route('admin.user.index');
    }

    public function destroy(Request $request) {
        $user = User::find($request->id);
        $user->delete();

        return redirect()->route('admin.user.index');

    }
}
