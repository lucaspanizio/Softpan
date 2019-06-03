<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerClient extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientes = Client::all();
        return view('layouts.register.client', compact('clientes'));         
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|max:8',
            'email' => 'required|email|max:255'
        ]);
        $cliente = new Client();
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->phone = $request->phone;
        $cliente->cpf = $request->cpf;
        $cliente->cnpj = $request->cnpj;
        $cliente->street = $request->street;
        $cliente->number = $request->number;
        $cliente->city = $request->city;
        $cliente->state = $request->state;        
        $cliente->situation = $request->situation;
        $cliente->save();

        return redirect()->route('admin.client.index');
    }

    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        $cliente = Client::find($request->id);
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->cnpj = $request->cnpj;
        $cliente->cpf = $request->cpf;
        $cliente->street = $request->street;
        $cliente->number = $request->number;
        $cliente->city = $request->city;
        $cliente->state = $request->state;
        $cliente->phone = $request->phone;
        $cliente->situation = $request->situation;
        $cliente->save();

        return redirect()->route('admin.client.index');
    }

    public function destroy(Request $request) {
        $cliente = Client::find($request->id);
        $cliente->delete();

        return redirect()->route('admin.client.index');

    }
}
