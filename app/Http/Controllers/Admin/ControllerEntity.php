<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Entity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerEntity extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $entities = Entity::all();
        return view('admin.register.entity', compact('entities'));
    }

    public function store(Request $request)
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
        $entity->celphone = $request->celphone;
        $entity->cnpj = $request->cnpj;
        $entity->street = $request->street;
        $entity->number = $request->number;
        $entity->city = $request->city;
        $entity->zipcode = $request->zipcode;
        $entity->neighborhood = $request->neighborhood;
        $entity->state = $request->state;
        $entity->situation = $request->situation;
        $entity->save();

        return redirect()->route('admin.entity.index');
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
        $entity->celphone = $request->celphone;
        $entity->cnpj = $request->cnpj;
        $entity->street = $request->street;
        $entity->number = $request->number;
        $entity->city = $request->city;
        $entity->zipcode = $request->zipcode;
        $entity->neighborhood = $request->neighborhood;
        $entity->state = $request->state;
        $entity->situation = $request->situation;
        $entity->save();

        return redirect()->route('admin.entity.index');
    }

    public function destroy(Request $request)
    {
        $entity = Entity::find($request->id);
        $entity->delete();

        return redirect()->route('admin.entity.index');
    }
}
