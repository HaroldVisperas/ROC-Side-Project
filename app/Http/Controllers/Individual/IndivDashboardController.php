<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndivDashboardController extends Controller
{
    public function create()
    {
        return view('individual.indiv-dashboard');
    }
}