<?php
namespace App\Services;

use App\Models\SubTask;

class SubTaskService
{
    public function AddSubTaskService(array $data)
    {
        $subtask = SubTask::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
        ]);
        return $subtask;
    }
}