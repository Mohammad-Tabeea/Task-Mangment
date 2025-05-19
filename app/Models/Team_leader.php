<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\Company;
use App\Models\TaskTeamLeader;
class Team_leader extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'number',
        'address',
        'user_id',
        'company_id',
        'task_id'

    ];
    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function taskteamleader(){
        $this->hasMany(TaskTeamLeader::class);
    }
}

