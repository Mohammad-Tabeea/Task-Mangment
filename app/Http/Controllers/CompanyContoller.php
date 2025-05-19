<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Services\CompanyServices;
class CompanyContoller extends Controller
{
    protected $companyServices;
    public function __construct(CompanyServices $companyServices)
    {
        $this->companyServices = $companyServices;
    }
    public function AddCompany(CompanyRequest $request)
    {
        $company = $this->companyServices->AddCompanyServices($request->validated());

        return $company;
    }
}
