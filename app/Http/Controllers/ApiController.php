<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Pagination\Paginator;
use Response;

class ApiController extends Controller
{
    //int status code
    protected $statusCode = 200;

    //Getter method to return stored status code.
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
    * Setter method to set status code.
    * It is returning current object
    * for chaining purposes.
    */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    //Function to return a generic response.
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }


    //if saving data is succressful then return response.
    protected function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)
            ->respond([
                'message' => $message
            ]);
    }

    //return if something is wrong.
    protected function respondUnprocessableEntity($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
            ->respond([
                'message' => $message
            ]);
    }

    //404 not found response
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param Paginator $items
     * @param $data
     * @return mixed
     */
    protected function respondWithPagination($items, $data)
    {

        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $items->total(),
                'total_pages' =>$items->lastPage(),
                'current_page' => $items->currentPage(),
                'next_page' => $items-> nextPageUrl(),
                'prev_page' => $items-> previousPageUrl(),
                'limit' => $items->perPage()
            ]
        ]);

        return $this->respond($data);
    }

    //Function to return an error response.
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

}
