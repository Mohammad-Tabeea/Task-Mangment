<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team_leader;
use App\Models\Task;
class TaskTeamLeader extends Model
{
    use HasFactory;
    protected $table = 'task_team_leaders';
    protected $fillable = [
        'task_id',
        'teamleader_id'
        
    ];
    public function task(){
        $this->belongsTo(Task::class, 'task_id');
    }
    public function teamleader()
{
    $this->belongsTo(Team_leader::class,'teamleader_id');
}
}
