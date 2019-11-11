<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ControllerDashboard extends Controller{
       
    public function index(){           
        
        $transactions = Transaction::all();
        $qtdCR = Transaction::select(DB::raw('count(*)'))->where('type','CR')
            ->groupBy('type')
            ->get();
        $qtdCR = Transaction::select(DB::raw('count(*)'))->where('type','CP')
            ->groupBy('type')
            ->get();

            return $qtdCR;

        return view('layouts.dashboard.dashboard', compact('transactions'));
    }
}
