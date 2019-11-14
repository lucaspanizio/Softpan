<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Transaction;

class ControllerDashboard extends Controller{
       
    public function index(){          
        $count_r = Transaction::where([['type','=','CR'],['situation','=','3']])->count();
        $count_p = Transaction::where([['type','=','CP'],['situation','=','3']])->count();

        return view('layouts.dashboard.dashboard', compact('count_r','count_p'));
    }
}
