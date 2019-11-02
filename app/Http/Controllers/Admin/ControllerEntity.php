<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Entity;
use App\Http\Controllers\Controller;
use App\Http\Models\Company;
use Illuminate\Http\Request;

class ControllerEntity extends Controller{
    
    public function index($e){         
        if ($e == 'client'){
            $entities = Entity::where('type', 'C')->get();
            $tipoEntidade = 'Cliente';
        }else {
            $entities = Entity::where('type', 'F')->get();
            $tipoEntidade = 'Fornecedor';
        }                
        $companies = Company::all();

        return view('layouts.register.entity', 
        compact('entities', 'e', 'tipoEntidade', 'companies'));
    }

    public function store(Request $request, $e){
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|max:8'
        ]);

        $entity = new Entity();
        $entity->name = $request->name;
        $entity->email = $request->email;
        $entity->phone1 = $request->phone1;
        $entity->phone2 = $request->phone2;
        $entity->cellphone = $request->cellphone;
        if ($e == 'client')
            $entity->type = 'C';
        else
            $entity->type = 'F';
        $entity->cpf = $request->cpf;
        $entity->cnpj = $request->cnpj;
        $entity->street = $request->street;
        $entity->number = $request->number;
        $entity->city = $request->city;
        $entity->zipcode = $request->zipcode;
        $entity->neighborhood = $request->neighborhood;
        $entity->state = $request->state;
        $entity->situation = $request->situation;

        // foreach ($request->companies as $c) {
        //     $company = Company::find($c);
        //     $entity->companies()->attach($company);
        // }

        $entity->save();

        return redirect()->back();
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|max:8'
        ]);

        $entity = Entity::find($request->id);
        $entity->name = $request->name;
        $entity->email = $request->email;
        $entity->phone1 = $request->phone1;
        $entity->phone2 = $request->phone2;
        $entity->cellphone = $request->cellphone;
        $entity->cpf = $request->cpf;
        $entity->cnpj = $request->cnpj;
        $entity->street = $request->street;
        $entity->number = $request->number;
        $entity->city = $request->city;
        $entity->zipcode = $request->zipcode;
        $entity->neighborhood = $request->neighborhood;
        $entity->state = $request->state;
        $entity->situation = $request->situation;

        // $entity->companies()->detach();
        // foreach ($request->companies as $c) {
        //     $company = Company::find($c);
        //     $entity->companies()->attach($company);
        // }

        $entity->save();

        return redirect()->back();
    }

    public function destroy(Request $request){           
        $entity = Entity::find($request->id); 
        $entity->delete(); 
        
        return redirect()->back();
    }
}
