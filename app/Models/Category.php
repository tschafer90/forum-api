<?php

namespace App\Models;

class Category extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
    ];
    
    
    /**
     * @return mixed
     */
    public function getThreadCountAttribute()
    {
        return $this->threads->count();
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
