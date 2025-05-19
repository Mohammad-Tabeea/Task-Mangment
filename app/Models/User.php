<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Company;
use App\Models\Team_leader;
use App\Models\Memmber;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'team_id',
        'role_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
   
    public function team(){
        return $this->belongsTo(Team::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function team_leader()
    {
        return $this->hasOne(Team_leader::class);
    }
    public function memmber()
    {
        return $this->hasOne(Memmber::class);
    }


}
