<?php
namespace App\Services;
use App\Models\priority;
class ProirityService
{
    public function AddProirityService(array $data)
    {
        $prority = priority::create([
            'pro_name' => $data['pro_name']
        ]);
        return $prority;
    }

}
