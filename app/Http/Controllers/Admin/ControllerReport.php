<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Entity;
use App\Http\Models\Company;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use Barryvdh\DomPDF\PDF;

class ControllerReport extends Controller
{

    public function index()
    {
        // $companies = Company::all();
        // $users = User::all();
        // $entities = Entity::all();
        // $transactions = Transaction::all();
        $count_r = Transaction::where([['type','=','CR'],['situation','=','3']])->count();
        $count_p = Transaction::where([['type','=','CP'],['situation','=','3']])->count();

        return view(
            'layouts.reports.reports',
            compact(
                // 'companies',
                // 'users',
                // 'entities',
                // 'transactions',
                'count_r',
                'count_p'
            )
        );
    }

    public function teste()
    {


        return PDF::loadHTML('<h1>Test</h1>')->stream();
    }
}
