<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SubTask;
use App\Models\Company;
use App\Models\SubTaskMemmber;

class Memmber extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'number',
        'address',
        'user_id'
];
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function sub_task()
{
    return $this->belongsTo(SubTask::class, 'sub_tasks_id');
}
public function company(){
    return $this->belongsTo(Company::class);
}
public function subtaskmemmber(){
    $this->hasMany(SubTaskMemmber::class);
}
}
