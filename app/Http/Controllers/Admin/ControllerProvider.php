<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerProvider extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fornecedores = Provider::all();
        return view('layouts.register.provider', compact('fornecedores'));         
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|max:8',
            'email' => 'required|email|max:255'
        ]);
        $fornecedor = new Provider();
        $fornecedor->name = $request->name;
        $fornecedor->email = $request->email;
        $fornecedor->phone = $request->phone;
        $fornecedor->cpf = $request->cpf;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->street = $request->street;
        $fornecedor->number = $request->number;
        $fornecedor->city = $request->city;
        $fornecedor->state = $request->state;        
        $fornecedor->situation = $request->situation;
        $fornecedor->save();

        return redirect()->route('admin.provider.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        $fornecedor = Provider::find($request->id);
        $fornecedor->name = $request->name;
        $fornecedor->email = $request->email;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->cpf = $request->cpf;
        $fornecedor->street = $request->street;
        $fornecedor->number = $request->number;
        $fornecedor->city = $request->city;
        $fornecedor->state = $request->state;
        $fornecedor->phone = $request->phone;
        $fornecedor->situation = $request->situation;
        $fornecedor->save();

        return redirect()->route('admin.provider.index');
    }

    public function destroy(Request $request) {
        $fornecedor = Provider::find($request->id);
        $fornecedor->delete();

        return redirect()->route('admin.provider.index');

    }
}
