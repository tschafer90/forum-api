<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ThreadFilters extends QueryFilters
{
    /**
     * Filter by user
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
     * Filter by category
     *
     * @param int $categoryId
     *
     * @return Builder
     */
    public function category(int $categoryId)
    {
        return $this->builder->where('category_id', $categoryId);
    }
}