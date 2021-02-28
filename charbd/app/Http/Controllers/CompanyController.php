<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\FuncCall;

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

    public function store(CompanyCreateRequest $request) {
        $company = Company::create($request->only(['name', 'information', 'address']));
        return response($company);
    }

    public function update(CompanyUpdateRequest $request, int $id) {
        $company = Company::find($id);
        $company->update($request->only(['name', 'information', 'address']));
        return response($company, Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id) {
        Company::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
