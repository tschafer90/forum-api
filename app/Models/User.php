<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use App\Filters\Filterable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, Filterable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
