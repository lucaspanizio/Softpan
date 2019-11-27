<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ControllerReport extends Controller
{
    public function index()
    {                
        $count_r = Transaction::where([['type', '=', 'CR'], ['situation', '=', '3']])->count();
        $count_p = Transaction::where([['type', '=', 'CP'], ['situation', '=', '3']])->count();

        return view('layouts.reports.reports', compact('count_r','count_p'));
    }

    public function getReport(Request $request)
    {               
        $count_r = Transaction::where([['type', '=', 'CR'], ['situation', '=', '3']])->count();
        $count_p = Transaction::where([['type', '=', 'CP'], ['situation', '=', '3']])->count(); 
        $min = $request->min; 
        $max = $request->max; 
                
        switch ($request->report) {
            case 1:
                $transactions = Transaction::where([['type','=','CR'],['situation','=','2'],['due_date','>=',Carbon::createFromFormat('d/m/Y', $min)],['due_date','<=',Carbon::createFromFormat('d/m/Y', $max)]])->get();  
                if($transactions->count() == 0){
                    return redirect()->back()->with('msg-error', 'Não há receitas liquidadas no período de vencimentos selecionado.');
                }                            
                $total = $transactions->sum('current_value');                          
                return view('layouts.reports.report1',compact('transactions','count_r','count_p','total','min','max'));
                break;            
            case 2:
                $transactions = Transaction::where([['type','=','CP'],['situation','=','2'],['due_date','>=',Carbon::createFromFormat('d/m/Y', $min)],['due_date','<=',Carbon::createFromFormat('d/m/Y', $max)]])->get();
                if($transactions->count() == 0){
                    return redirect()->back()->with('msg-error', 'Não há despesas liquidadas no período de vencimentos selecionado.');
                }                            
                $total = $transactions->sum('current_value');                          
                return view('layouts.reports.report2',compact('transactions','count_r','count_p','total','min','max'));
        }
                       
    }
}
