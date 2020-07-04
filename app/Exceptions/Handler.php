<?php

namespace App\Exceptions;

use App\Exceptions\ExceptionTrait;
use Exception;
// use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ExceptionTrait;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if($request->expectsJson()){
        //     if($exception instanceof ModelNotFoundException){
        //         return response()->json([
        //                 'errors'=>'Product Model not Found'
        //             ],Response::HTTP_NOT_FOUND);
        //     }
        // }

        // if ($exception instanceof NotFoundHttpException) {
        //     return response()->json([
        //         'errors' => 'Incorect route'
        //     ],Response::HTTP_NOT_FOUND);
        // }


            return $this->apiException($request,$exception);
        }


                       // 'Mode not found'
                    // 404


        // dd($exception);
        return parent::render($request, $exception);
        // return parent::render($request, $e);

    }
}
