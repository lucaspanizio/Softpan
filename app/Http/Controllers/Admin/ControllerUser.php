<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Models\Company;
use App\Http\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerUser extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function reset_index()
    {
        return view('auth.reset');
    }

    public function reset(Request $request)
    {
        $user = Auth::user();
        if (!empty($request->password)) {
            if ($request->password == $request->input('password_confirmation'))
                $user->password = bcrypt($request->password);
            else
                return redirect()->back()->with('msg-error', 'As senhas digitadas são diferentes!');
        } else {
            return redirect()->back()->with('msg-error', 'Senha não pode ser em branco!');
        }
        $user->save();
        return redirect()->back()->with('msg-success', 'Senha alterada com sucesso!');
    }

    public function index()
    {
        $users = User::all();
        $companies = Company::all();
        $count_r = Transaction::where([['type', '=', 'CR'], ['situation', '=', '3']])->count();
        $count_p = Transaction::where([['type', '=', 'CP'], ['situation', '=', '3']])->count();

        return view(
            'layouts.register.user',
            compact(
                'users',
                'companies',
                'count_r',
                'count_p'
            )
        );
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
        $user->password = bcrypt($request->input('password'));
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

        if (!empty($request->password)) {
            if ($request->password == $request->input('password_confirmation'))
                $user->password = bcrypt($request->password);
        }

        $user->situation = $request->situation;
        $user->save();

        return redirect()->route('admin.user.index');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return redirect()->back();
    }
}
