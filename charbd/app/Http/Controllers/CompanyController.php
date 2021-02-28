<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
       return Company::all();
    }

    public function show($id) {
        $company = Company::find($id);
        return response($company);
    }

    public function store(Request $request) {
        $company = Company::create($request->all());
        return response($company);
    }
}
