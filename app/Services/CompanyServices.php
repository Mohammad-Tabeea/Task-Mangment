<?php

namespace App\Services;

use App\Models\Company;

class CompanyServices
{
    public function AddCompanyServices(array $data)
    {
        $company = Company::create([
            'company_name' => $data['company_name'],
        ]);

        return $company;
    }
}
