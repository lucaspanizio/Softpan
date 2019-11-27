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
        $count_r = Transaction::where([['type', '=', 'CR'], ['situation', '=', '3']])->count();
        $count_p = Transaction::where([['type', '=', 'CP'], ['situation', '=', '3']])->count();
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
        $original = str_replace('.','',$request->original_value);
        $original = str_replace(',','.',$original);

        $transaction = new Transaction();
        $transaction->due_date = Carbon::createFromFormat('d/m/Y', $request->due_date);
        $transaction->description = $request->description;
        $transaction->installments = $request->installments;
        $transaction->original_value = $original;
        $transaction->current_value = $original;
        $transaction->rates = $request->rates;

        if ($transaction->due_date < Carbon::now()) $transaction->situation = "3";
        else $transaction->situation = "1";

        if ($t == 'receivable') $transaction->type = 'CR';
        else $transaction->type = 'CP';

        $transaction->entity()->associate(Entity::find($request->input('entity')));
        $transaction->user()->associate(User::find(Auth::user()->id));
        $transaction->company()->associate(Company::find($request->input('company')));
        $transaction->payment()->associate(FormOfPayment::find($request->input('form_of_payment')));
        $transaction->save();

        return redirect()->back();
    }

    public function update(Request $request)
    {               
        $original = str_replace('.','',$request->original_value);
        $original = str_replace(',','.',$original);

        $transaction = Transaction::find($request->id);
        $transaction->due_date = Carbon::createFromFormat('d/m/Y', $request->due_date);
        $transaction->description = $request->description;
        $transaction->installments = $request->installments;
        $transaction->original_value = $original;
        $transaction->current_value = $original;
        $transaction->rates = $request->rates;

        $transaction->entity()->dissociate();
        $transaction->user()->dissociate();
        $transaction->company()->dissociate();
        $transaction->payment()->dissociate();
        $transaction->save();

        $transaction->entity()->associate(Entity::find($request->entity));
        $transaction->user()->associate(User::find(Auth::user()->id));
        $transaction->company()->associate(Company::find($request->company));
        $transaction->payment()->associate(FormOfPayment::find($request->form_of_payment));
        $transaction->save();

        return redirect()->back();
    }

    public function liquidate(Request $request)
    {
        $transaction = Transaction::find($request->id);

        $juros = $request->interest_rate;
        $multa = $request->penalty;
        
        if($multa != null && $juros == null){
            $transaction->current_value += $multa;  
            $transaction->penalty = $multa;          
        }else if($multa == null && $juros != null){
            $transaction->current_value += $juros;
            $transaction->interest_rate = $juros;  
        }else if($multa != null && $juros != null){
            $transaction->current_value += $juros + $multa;
            $transaction->interest_rate = $juros;
            $transaction->penalty = $multa; 
        }

        $transaction->pay_off_date = \Carbon\Carbon::now();
        $transaction->situation = 2;
        $transaction->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transaction->delete();

        return redirect()->back();
    }
}
