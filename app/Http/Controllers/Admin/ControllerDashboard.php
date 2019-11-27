<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Transaction;

class ControllerDashboard extends Controller{
       
    public function index(){  
        /* Contas a Receber */        
        $r_janeiro = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 1; })->reduce(function($soma,$t){ return $soma + $t->current_value; });            
        $r_fevereiro = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 2; })->reduce(function($soma,$t){ return $soma + $t->current_value; });               
        $r_marco = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 3; })->reduce(function($soma,$t){ return $soma + $t->current_value; });           
        $r_abril = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 4; })->reduce(function($soma,$t){ return $soma + $t->current_value; });            
        $r_maio = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 5; })->reduce(function($soma,$t){ return $soma + $t->current_value; });               
        $r_junho = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 6; })->reduce(function($soma,$t){ return $soma + $t->current_value; });           
        $r_julho = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 7; })->reduce(function($soma,$t){ return $soma + $t->current_value; });        
        $r_agosto = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 8; })->reduce(function($soma,$t){ return $soma + $t->current_value; });           
        $r_setembro = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 9; })->reduce(function($soma,$t){ return $soma + $t->current_value; });             
        $r_outubro = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 10; })->reduce(function($soma,$t){ return $soma + $t->current_value; });             
        $r_novembro = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 11; })->reduce(function($soma,$t){ return $soma + $t->current_value; });            
        $r_dezembro = Transaction::where('type','=','CR')->get()->filter(function ($t, $key){ return $t->due_date->month == 12; })->reduce(function($soma,$t){ return $soma + $t->current_value; });       
        
        /* Contas a Pagar */        
        $p_janeiro = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 1; })->reduce(function($soma,$t){ return $soma + $t->current_value; });            
        $p_fevereiro = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 2; })->reduce(function($soma,$t){ return $soma + $t->current_value; });               
        $p_marco = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 3; })->reduce(function($soma,$t){ return $soma + $t->current_value; });           
        $p_abril = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 4; })->reduce(function($soma,$t){ return $soma + $t->current_value; });            
        $p_maio = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 5; })->reduce(function($soma,$t){ return $soma + $t->current_value; });               
        $p_junho = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 6; })->reduce(function($soma,$t){ return $soma + $t->current_value; });           
        $p_julho = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 7; })->reduce(function($soma,$t){ return $soma + $t->current_value; });        
        $p_agosto = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 8; })->reduce(function($soma,$t){ return $soma + $t->current_value; });           
        $p_setembro = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 9; })->reduce(function($soma,$t){ return $soma + $t->current_value; });             
        $p_outubro = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 10; })->reduce(function($soma,$t){ return $soma + $t->current_value; });             
        $p_novembro = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 11; })->reduce(function($soma,$t){ return $soma + $t->current_value; });            
        $p_dezembro = Transaction::where('type','=','CP')->get()->filter(function ($t, $key){ return $t->due_date->month == 12; })->reduce(function($soma,$t){ return $soma + $t->current_value; });       
        
        $count_r = Transaction::where([['type','=','CR'],['situation','=','3']])->count();
        $count_p = Transaction::where([['type','=','CP'],['situation','=','3']])->count();

        $sum_r = Transaction::where('type','=','CR')->sum('current_value');       
        $sum_p = Transaction::where('type','=','CP')->sum('current_value');

        $payables = $p_janeiro.','.$p_fevereiro.','.$p_marco.','.$p_abril.','.$p_maio.','.$p_junho.','.$p_julho.','.$p_agosto.','.$p_setembro.','.$p_outubro.','.$p_novembro.','.$p_dezembro;
        $receivables =  $r_janeiro.','.$r_fevereiro.','.$r_marco.','.$r_abril.','.$r_maio.','.$r_junho.','.$r_julho.','.$r_agosto.','.$r_setembro.','.$r_outubro.','.$r_novembro.','.$r_dezembro;

        return view('layouts.dashboard.dashboard', 
        compact(
            'count_r',
            'count_p',
            'sum_r',
            'sum_p', 
            'payables',
            'receivables'
        ));
    }
}
