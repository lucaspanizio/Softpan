<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\Company;
use App\Http\Models\Transaction;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerCompany extends Controller{
    
    public function index(){
        $companies = Company::all(); 
        $count_r = Transaction::where([['type','=','CR'],['situation','=','3']])->count();
        $count_p = Transaction::where([['type','=','CP'],['situation','=','3']])->count();       
        return view('layouts.register.company', compact('companies','count_r','count_p'));  
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'max:8'            
        ]);
        $company = new Company();
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->cnpj = $request->cnpj;
        $company->street = $request->street;
        $company->number = $request->number;
        $company->city = $request->city;
        $company->zipcode = $request->zipcode;
        $company->neighborhood = $request->neighborhood;
        $company->state = $request->state;        
        $company->situation = $request->situation;
        $company->save();

        return redirect()->route('admin.company.index');
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'max:8'
        ]);
        
        $company = Company::find($request->id);
        $company->name = $request->name;        
        $company->phone = $request->phone;
        $company->cnpj = $request->cnpj;
        $company->street = $request->street;
        $company->number = $request->number;
        $company->zipcode = $request->zipcode;
        $company->neighborhood = $request->neighborhood;
        $company->city = $request->city;
        $company->state = $request->state;        
        $company->situation = $request->situation;
        $company->save();

        return redirect()->route('admin.company.index');
    }

    public function destroy(Request $request){
        $company = Company::find($request->id);
        $company->delete();

        return redirect()->route('admin.company.index');
    }
}
