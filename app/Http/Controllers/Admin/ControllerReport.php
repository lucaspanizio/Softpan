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
        $companies = Company::all();
        $users = User::all();
        $entities = Entity::all();
        $transactions = Transaction::all();

        return view('layouts.reports.reports', compact('companies', 'users', 'entities', 'transactions'));
    }

    public function teste()
    {
 
        
        return PDF::loadHTML('<h1>Test</h1>')->stream();       
    }
}
