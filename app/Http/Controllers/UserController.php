<?php

namespace App\Http\Controllers;

use App\Filters\UserFilters;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * @var string
     */
    protected $model = User::class;
    
    /**
     * @var string
     */
    protected $transformer = UserTransformer::class;
    
    /**
     * @var string
     */
    protected $filters = UserFilters::class;
    
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
