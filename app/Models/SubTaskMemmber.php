<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Memmber;
use App\Models\SubTask;

class SubTaskMemmber extends Model
{
    use HasFactory;
    protected $table = 'sub_task_memmbers';
    protected $fillable = [
        'subtask_id',
        'memmber_id',
        
    ];
    public function memmber()
    {
        $this->belongsTo(Memmber::class, 'memmber_id');
    }
    public function subtask()
    {
        $this->belongsTo(SubTask::class, 'subtask_id');
    }
}
