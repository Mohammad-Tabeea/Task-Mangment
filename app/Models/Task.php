<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Team_leader;
use App\Models\TaskTeamLeader;


class Task extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'start_date',
        'end_date',
        'status_id',
        'team_id'
    ];
    public function subtask(){
        return $this->hasMany(SubTask::class);
    }
    public function team(){
        return $this->BelongsTo(Team::class);
    }
    public function team_leader()
    {
        return $this->hasOne(Team_leader::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function taskteamleader(){
        $this->hasMany(TaskTeamLeader::class);
    }
}
