<?php

namespace App\Exceptions;

use App\Http\Controllers\BaseController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
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
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $response = new BaseController();

        if ($exception instanceof ModelNotFoundException) {

            $message = '[ ' . str_replace('\\App', '', $exception->getModel()) . ' not found ]'
                . ' [ Error Line : ' . $exception->getLine() . ' ] [ Message : ' . $exception->getMessage();

            Log::error($message);

            return $response->apiResponse(
                $response::ERROR, null,
                trans('messages.not_found_record'),
                $response::HTTP_NOT_FOUND);

        } elseif ($exception instanceof NotFoundHttpException) {


            $message = '[ ' . str_replace('\\App', '', $exception->getModel()) . ' not found ]'
                . ' [ Error Line : ' . $exception->getLine() . ' ] [ Message : ' . $exception->getMessage();

            Log::error($message);

            return $response->apiResponse(
                $response::ERROR, null,
                trans('messages.page_not_found'),
                $response::HTTP_NOT_FOUND);

        } else {

            return $response->apiResponse(
                $response::ERROR, null,
                trans('messages.internal_server_error'),
                $response::HTTP_NOT_FOUND);

           // return parent::render($request, $exception);
        }

    }
}
