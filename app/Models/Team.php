<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Team extends Model
{
    use HasFactory;
    protected $fillable =[
        'team_name',
        'company_id'
    ];
    public function user(){
        return $this->hasMany(User::class);
    }
    public function task(){
        return $this->hasMany(Task::class);
    }

}
