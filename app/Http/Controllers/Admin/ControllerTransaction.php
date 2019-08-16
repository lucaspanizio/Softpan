<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Transaction;
use App\Http\Controllers\Controller;

class ControllerTransaction extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.register.etransaction', compact('transactions'));
    }

    public function store(Request $request)
    {        
        $transaction = new Transaction();
        $transaction->id_user = $request->id_user;
        $transaction->id_company = $request->id_company;
        $transaction->id_entity = $request->id_entity;
        $transaction->due_date = $request->due_date;
        $transaction->pay_off_date = $request->pay_off_date;
        $transaction->description = $request->description;
        $transaction->original_value = $request->original_value;
        $transaction->current_value = $request->current_value;
        $transaction->type = $request->type;
        $transaction->situation = $request->situation;
        $transaction->save();

        return redirect()->route('admin.transaction.index');
    }

    public function update(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transaction->id_user = $request->id_user;
        $transaction->id_company = $request->id_company;
        $transaction->id_entity = $request->id_entity;
        $transaction->due_date = $request->due_date;
        $transaction->pay_off_date = $request->pay_off_date;
        $transaction->description = $request->description;
        $transaction->original_value = $request->original_value;
        $transaction->current_value = $request->current_value;
        $transaction->type = $request->type;
        $transaction->situation = $request->situation;
        $transaction->save();

        return redirect()->route('admin.transaction.index');
    }

    public function destroy(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transaction->delete();

        return redirect()->route('admin.transaction.index');
    }
}
