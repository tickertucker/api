<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait
{
    public function apiException($request,$e)
    {
        // if($e instanceof ModelNotFoundException){
        if($this->isModel($e)){
            // return response()->json([
            //         'errors'=>'Product Model not Found'
            //     ],Response::HTTP_NOT_FOUND);
            return $this->ModelResponse($e);
        }


        // if ($e instanceof NotFoundHttpException) {
        if ($this->isHttp($e)) {
        //     return response()->json([
        //         'errors' => 'Incorect route'
        //     ],Response::HTTP_NOT_FOUND);
            return $this->HttpResponse($e);
        }
        // return $request->all();

        return parent::render($request, $e);

    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function ModelResponse($e)
    {
        return response()->json([
                    'errors'=>'Product Model not Found'
                ],Response::HTTP_NOT_FOUND);
    }

    protected function HttpResponse($e)
    {
            return response()->json([
                'errors' => 'Incorect route'
            ],Response::HTTP_NOT_FOUND);
    }
}
