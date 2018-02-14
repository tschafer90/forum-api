<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract as BaseTransformer;
use Carbon\Carbon;

class CategoryTransformer extends BaseTransformer
{
    /**
     * @var array
     */
    protected $availableIncludes = [
        'threads',
    ];
    
    /**
     * @var array
     */
    protected $defaultIncludes = [];
    
    public function transform(Category $category)
    {
        $return = [
            'id' => (int) $category->id,
            'title' => (string) $category->title,
            'description' => (string) $category->description,
            'created_at' => Carbon::parse($category->created_at)->toAtomString(),
            'updated_at' => Carbon::parse($category->updated_at)->toAtomString(),
            'thread_count' => (int) $category->thread_count,
        ];
        
        return $return;
    }
    
    /**
     * @param Category $category
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeThreads(Category $category)
    {
        return $this->collection($category->threads, new ThreadTransformer);
    }
}