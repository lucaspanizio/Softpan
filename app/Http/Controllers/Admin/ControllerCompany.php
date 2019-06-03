<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\Company;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerCompany extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empresas = Company::all();        
        return view('layouts.register.company', compact('empresas'));  
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|max:8'            
        ]);
        $empresa = new Company();
        $empresa->name = $request->name;
        $empresa->phone = $request->phone;
        $empresa->cnpj = $request->cnpj;
        $empresa->street = $request->street;
        $empresa->number = $request->number;
        $empresa->city = $request->city;
        $empresa->state = $request->state;        
        $empresa->situation = $request->situation;
        $empresa->save();

        return redirect()->route('admin.company.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|max:8'
        ]);
        
        $empresa = Company::find($request->id);
        $empresa->name = $request->name;        
        $empresa->phone = $request->phone;
        $empresa->cnpj = $request->cnpj;
        $empresa->street = $request->street;
        $empresa->number = $request->number;
        $empresa->city = $request->city;
        $empresa->state = $request->state;        
        $empresa->situation = $request->situation;
        $empresa->save();

        return redirect()->route('admin.company.index');
    }

    public function destroy(Request $request) {
        $empresa = Company::find($request->id);
        $empresa->delete();

        return redirect()->route('admin.company.index');

    }
}
