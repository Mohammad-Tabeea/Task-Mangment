<?php

namespace App\Http\Controllers;


use App\Models\priority;
use App\Services\ProirityService;
use App\Http\Requests\ProirityRequest;

class priorityController extends Controller
{
    protected $proirityService;
    public function __construct(ProirityService $proirityService)
    {
        $this->proirityService = $proirityService;
    }
    public function Addpriority(ProirityRequest $request)
    {

        $priority = $this->proirityService->AddProirityService($request->validated());

        return $priority;
    }

}
