<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Transaction;
use App\Http\Models\Entity;
use App\Http\Models\Company;
use App\Http\Models\FormOfPayment;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ControllerTransaction extends Controller
{

    public function index($t)
    {
        if ($t == 'receivable') {
            $transactions = Transaction::where('type', 'CR')->get();
            $entities = Entity::where('type', 'C')->get();
            $typeTransaction = "receivable";
            $tipoTransacao = "Receita";
        } else {
            $transactions = Transaction::where('type', 'CP')->get();
            $entities = Entity::where('type', 'F')->get();
            $typeTransaction = "payable";
            $tipoTransacao = "Despesa";
        }

        $payments = FormOfPayment::all();
        $companies = Company::all();
        $count_r = Transaction::where([['type','=','CR'],['situation','=','3']])->count();
        $count_p = Transaction::where([['type','=','CP'],['situation','=','3']])->count();
        return view(
            'layouts.transactions.transaction',
            compact(
                'transactions',
                'payments',
                'companies',
                'typeTransaction',
                'tipoTransacao',
                'entities',
                'count_r',
                'count_p'
            )
        );
    }
   
    public function store(Request $request, $t)
    {        
        $transaction = new Transaction();
        $transaction->due_date = Carbon::createFromFormat('d/m/Y', $request->due_date);      
        $transaction->description = $request->description;
        $transaction->installments = $request->installments;
        $transaction->original_value = $request->original_value;
        $transaction->current_value = $request->original_value;
        $transaction->rates = $request->rates;
        $transaction->situation = "1";
        if ($t == 'receivable')
            $transaction->type = 'CR';
        else
            $transaction->type = 'CP';
        $transaction->save();
        $transaction->entity()->associate(Entity::find($request->input('entity')));
        $transaction->user()->associate(User::find(Auth::user()->id));
        $transaction->company()->associate(Company::find($request->input('company')));
        $transaction->payment()->associate(FormOfPayment::find($request->input('form_of_payment')));
        $transaction->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {            
        return $request;   
        $transaction = Transaction::find($request->id);        
        $transaction->due_date = Carbon::createFromFormat('d/m/Y', $request->due_date);
        $transaction->description = $request->description;
        $transaction->installments = $request->installments;
        $transaction->original_value = $request->original_value;
        $transaction->current_value = $request->original_value;
        $transaction->rates = $request->rates;
        $transaction->company()->dissociate();
        $transaction->user()->dissociate();
        $transaction->entity()->dissociate();
        $transaction->payment()->dissociate();
        $transaction->save();
        $transaction->entity()->associate(Entity::find($request->input('entity')));
        $transaction->user()->associate(User::find(Auth::user()->id));
        $transaction->company()->associate(Company::find($request->input('company')));
        $transaction->payment()->associate(FormOfPayment::find($request->input('form_of_payment')));
        $transaction->save();
        return redirect()->back();
    }

    public function liquidate(Request $request)
    {
        $transaction = Transaction::find($request->id);

        $transaction->interest_rate = $request->interest_rate;
        $transaction->penalty = $request->penalty;
        $transaction->current_value = $request->current_value;
        $transaction->pay_off_date = \Carbon\Carbon::now();
        $transaction->situation = "2";

        $transaction->save();

        if ($request->type === "CR") {
            return redirect()->action('Admin\ControllerTransaction@index', 'receivable');
        }
        return redirect()->action('Admin\ControllerTransaction@index', 'payable');
    }

    public function destroy(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transaction->delete();

        return redirect()->back();
    }
}
