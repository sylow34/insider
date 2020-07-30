<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    public const HTTP_OK = Response::HTTP_OK; // 200
    public const HTTP_CREATED = Response::HTTP_CREATED;
    public const HTTP_UNAUTHORIZED = Response::HTTP_UNAUTHORIZED;
    public const HTTP_UNPROCESSABLE_ENTITY = Response::HTTP_UNPROCESSABLE_ENTITY; // 422
    public const HTTP_NOT_FOUND = Response::HTTP_NOT_FOUND;
    public const HTTP_INTERNAL_SERVER_ERROR = Response::HTTP_INTERNAL_SERVER_ERROR;
    public const HTTP_BAD_REQUEST = Response::HTTP_BAD_REQUEST;

    public const SUCCESS = 'success';
    public const ERROR = 'error';
    public const WARNING = 'warning';
    public const OTP_TYPE_EMAIL = 'email';
    public const OTP_TYPE_SMS = 'sms';

    public function ss($data)
    {
        return \response()->json($data);
    }

    public function apiResponse($resultType, $data, $message = null, $code = 200)
    {
        $response = [];
        if (isset($data)) {
            $resultType !== self::ERROR ? $response['data'] = $data : null;
            $resultType === self::ERROR ? $response['errors'] = $data : null;
        }
        $response['success'] = $resultType === self::SUCCESS;

        isset($message) ? $response['message'] = $message : null;
        return response()->json($response, $code);
    }

    public function logError(\Exception $e, string $message = null, string $line, string $method): void
    {
        Log::error($message, [
            'error' => $e->getMessage(),
            'line' => $line,
            'Method' => $method
        ]);
    }

    public function logInfo( string $message = null, array $data=[]): void
    {
        Log::info($message, $data);
    }


}
