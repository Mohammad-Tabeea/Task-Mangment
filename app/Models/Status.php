<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;
    protected $fillable =[
        'status_name'
    ];
    public function task(){
        return $this->hasMany(Task::class);
    }
    public function subtask(){
        return $this->hasMany(SubTask::class);
    }
}
