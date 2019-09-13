<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Entity;
use App\Http\Controllers\Controller;
use App\Http\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerEntity extends Controller
{
    public function index($e)
    {
        if ($e == 'client') {
            $entities = DB::table('entities')->where('type', 'C')->get();
            $typeEntity = 'client';
            $tipoEntidade = 'Cliente';
        } else {
            $entities = DB::table('entities')->where('type', 'F')->get();
            $typeEntity = 'provider';
            $tipoEntidade = 'Fornecedor';
        }
        $companies = Company::all();

        return view('layouts.register.entity', compact('entities', 'typeEntity', 'tipoEntidade', 'companies'));
    }

    public function store(Request $request, $e)
    {
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

        $entity->save();

        for ($i = 0; $i < $request->companies; $i++) {
            $company = Company::find($request->companies[$i]);
            $entity->company()->attach($company);
        }

        $entity->save();

        // Se a entidade é do tipo cliente
        if ($request->type == 'C')
            return redirect()->route('admin.entity.index', 'client');
        // Se a entidade é do tipo fornecedor
        else
            return redirect()->route('admin.entity.index', 'provider');
    }

    public function update(Request $request)
    {
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

        for ($i = 0; $i < $request->companies; $i++) {
            $company = Company::find($request->companies[$i]);
            $entity->company()->detta($company);
            $entity->company()->attach($company);
        }

        $entity->save();

        // Se a entidade é do tipo cliente
        if ($entity->type == 'C')
            return redirect()->route('admin.entity.index', 'client');
        // Se a entidade é do tipo fornecedor
        else
            return redirect()->route('admin.entity.index', 'provider');
    }

    public function destroy(Request $request)
    {
        $entity = Entity::find($request->id);
        $entity->delete();

        // Se a entidade é do tipo cliente
        if ($request->type == 'C')
            return redirect()->route('admin.entity.index', 'client');
        // Se a entidade é do tipo fornecedor
        else
            return redirect()->route('admin.entity.index', 'provider');
    }
}
