<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class CommentFilters extends QueryFilters
{
    /**
     * Filter by User
     *
     * @param int $userId
     *
     * @return Builder
     */
    public function user(int $userId)
    {
        return $this->builder->where('user_id', $userId);
    }
    
    /**
     * Filter by thread
     *
     * @param int $threadId
     *
     * @return Builder
     */
    public function thread(int $threadId)
    {
        return $this->builder->where('thread_id', $threadId);
    }
}