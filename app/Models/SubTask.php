<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Memmber;
use App\Models\priority;
use App\Models\SubTaskMemmber;
use App\Models\Status;
class SubTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'sub_tasks_id'
    ];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function memmber()
    {
        return $this->hasOne(Memmber::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function prority()
    {
        return $this->belongsTo(priority::class);
    }
    public function subtaskmemmber(){
        $this->hasMany(SubTaskMemmber::class);
    }
}
