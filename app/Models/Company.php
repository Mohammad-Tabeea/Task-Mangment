<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'company_name'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($produact) {
            $produact->id = Uuid::uuid4()->toString();
        });
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function team_leader()
    {
        return $this->hasMany(Team_leader::class);
    }
    public function memmber()
    {
        return $this->hasMany(Memmber::class);
    }
}
