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
        $count_r = Transaction::where([['type', '=', 'CR'], ['situation', '=', '3']])->count();
        $count_p = Transaction::where([['type', '=', 'CP'], ['situation', '=', '3']])->count();

        return view('auth.reset', compact('count_r', 'count_p'));
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
        if (User::where('email', $request->email)->count() == 0) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->situation = $request->input('situation');
            $user->save();
        } else {
            return redirect()->back()->with('msg-error', 'Já existe um usuário registrado com o E-mail informado.');
        }

        return redirect()->route('admin.user.index');
    }

    public function update(Request $request)
    {
        if (User::where([['email', $request->email], ['id', '!=', $request->id]])->count() > 0) {
            return redirect()->back()->with('msg-error', 'Já existe um usuário registrado com o E-mail informado.');
        }

        $user = User::find($request->id);

        if (!empty($request->password) || !empty($request->password_confirmation)) {
            if ($request->password == $request->input('password_confirmation')) {
                $user->password = bcrypt($request->password);
            } else {
                return redirect()->back()->with('msg-error', 'As senhas digitadas são diferentes.');
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
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
