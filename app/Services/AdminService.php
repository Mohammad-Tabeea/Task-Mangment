<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    public function registerAdmin(array $data)
    {
        $company = Company::create([
            'company_name' => $data['company_name'],
        ]);

        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company_id' => $company->id,
        ]);

        return $admin;
    }
}
