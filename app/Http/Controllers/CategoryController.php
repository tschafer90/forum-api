<?php

namespace App\Http\Controllers;

use App\Filters\CategoryFilters;
use App\Models\Category;
use App\Transformers\CategoryTransformer;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    /**
     * @var string
     */
    protected $model = Category::class;
    
    /**
     * @var string
     */
    protected $transformer = CategoryTransformer::class;
    
    /**
     * @var string
     */
    protected $filters = CategoryFilters::class;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
