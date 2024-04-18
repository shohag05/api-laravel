<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = ['name', 'email', 'password', 'role'];

    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
