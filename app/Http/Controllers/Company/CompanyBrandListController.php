<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyBrandListController extends Controller
{
    public function create()
    {
        return view('company.company-brandlist');
    }
}