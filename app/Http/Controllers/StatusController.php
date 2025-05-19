<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StatusRequest;
use App\Services\StatusService;

class StatusController extends Controller
{
    protected $statusService;
    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }
    public function Addstatus(StatusRequest $request)
    {
        $status = $this->statusService->AddStastusService($request->validated());
        return $status;
    }
}
