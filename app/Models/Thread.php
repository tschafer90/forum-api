<?php

namespace App\Models;


class Thread extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
    ];
    
    /**
     * @return mixed
     */
    public function getCommentCountAttribute()
    {
        return $this->comments->count();
    }
    
    /**
     * @return mixed
     */
    public function getDateDiffAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
