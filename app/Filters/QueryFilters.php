<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilters
{
    /**
     * The request object.
     *
     * @var Request
     */
    public $request;
    
    /**
     * The builder instance.
     *
     * @var Builder
     */
    protected $builder;
    
    /**
     * Exclude parameters.
     *
     * @var array
     */
    protected $exclude = [
        'include',
        'exclude',
    ];
    
    /**
     * Create a new QueryFilters instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * Apply the filters to the builder.
     *
     * @param  Builder $builder
     *
     * @return Builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        
        foreach ($this->filters() as $name => $value) {
            if ( ! method_exists($this, $name)) {
                continue;
            }
            
            if (strlen($value)) {
                $this->$name($value);
            } else {
                $this->$name();
            }
        }
        
        return $this->builder;
    }
    
    /**
     * Get all request filters data.
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->except($this->exclude);
    }
    
    /**
     * Limit the number of results
     *
     * @param  int $count
     *
     * @return Builder
     */
    public function maxResults($count)
    {
        return $this->builder->limit($count);
    }
}