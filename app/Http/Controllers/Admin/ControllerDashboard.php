<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Transaction;

class ControllerDashboard extends Controller{
       
    public function index(){  
        
        /* CONTAS A RECEBER COM VALOR ATUALIZADO  
        SELECT T1.CURRENT_VALUE AS TOTAL FROM TRANSACTIONS AS T1 
        WHERE YEAR(NOW()) = YEAR(DUE_DATE) AND 
            MONTH(DUE_DATE) = 11 AND TYPE = 'CR'; */

        /* CONTAS A RECEBER COM VALOR ORIGINAL 
        SELECT T2.ORIGINAL_VALUE AS TOTAL FROM TRANSACTIONS AS T2 
        where YEAR(NOW()) = YEAR(DUE_DATE) AND 
            MONTH(DUE_DATE) = 11 AND 
            CURRENT_VALUE IS NULL AND TYPE = 'CR';	 */
          
   		// 	//variavel carregando todos os valores
    	//   $valores = [$aberto, $orcamento,$aprovacao,$execucao,$aguardando,$retirado];
  
		// 																																							// retorna a variável na view
        // return view('admin.index', compact(['clientes','produtos','servicos','oss','valores']));

        $count_r = Transaction::where([['type','=','CR'],['situation','=','3']])->count();
        $count_p = Transaction::where([['type','=','CP'],['situation','=','3']])->count();

        $sum_r = Transaction::where('type','=','CR')->sum('current_value');       
        $sum_p = Transaction::where('type','=','CP')->sum('current_value');

        $payables = [];
        $receivables =  [];

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
