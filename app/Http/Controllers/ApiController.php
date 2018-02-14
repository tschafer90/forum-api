<?php

namespace App\Http\Controllers;

use App\Models\BaseModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ApiController extends Controller
{
    /**
     * @var string
     */
    protected $model;
    
    /**
     * @var string
     */
    protected $transformer;
    
    /**
     * @var string
     */
    protected $filters;
    
    /**
     * @var int
     */
    protected $statusCode = 200;
    
    /**
     * @return int
     */
    public function getStatusCode() : int
    {
        return $this->statusCode;
    }
    
    /**
     * @param int $statusCode
     *
     * @return $this
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
    
    /**
     * @param $data
     * @param array $headers
     *
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return response($data, $this->getStatusCode(), $headers);
    }
    
    /**
     * @param $message
     *
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }
    
    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?: 25;
        $paginator = $this->model::filter(new $this->filters($request))->paginate($limit);
        $data = $paginator->getCollection();
    
        $data = fractal($data, new $this->transformer)->paginateWith(new IlluminatePaginatorAdapter($paginator));
    
        if ($request->input('include')) {
            $data->parseIncludes($request->input('include'));
        }
    
        return response()->json($data->toArray());
    }
    
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Int $id
     *
     * @return Response
     * @internal param BaseModel $model
     *
     * @internal param \App\Models\Thread $thread
     */
    public function show(Request $request, Int $id)
    {
        $data = $this->model::find($id);
        
        if(! $data) {
            return $this->respondNotFound();
        }
        
        $data = fractal($data, new $this->transformer);
    
        if ($request->input('include')) {
            $data->parseIncludes($request->input('include'));
        }
        
        return response()->json($data);
    }
}