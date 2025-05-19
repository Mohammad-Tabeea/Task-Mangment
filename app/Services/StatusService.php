<?php
namespace App\Services;

use App\Models\Status;
class StatusService {
    public function AddStastusService(array $data){
        $stastus =Status::create([
            'status_name' => $data['status_name']
        ]);
        return $stastus;
    }
}