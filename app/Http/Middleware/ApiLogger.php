<?php

namespace App\Http\Middleware;

use Closure;
use Defuse\Crypto\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ApiLogger
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if (env('API_LOGGER', false)) {

            $log = null;
          //  if (Auth::check()) {

                $startTime = LARAVEL_START;
                $endTime = microtime(true);
                $log = '[' . date('Y-m-d H:i:s') . ']';
              // $log .= '[ User : ' . Auth::user()->name . 'Email : ' . Auth::user()->email . ']';
                $log .= '[' . ($endTime - $startTime) * 100 . ' ms ]';
                $log .= '[' . $request->ip() . ']';
                $log .= '[' . $request->method() . ']';
                $log .= '[' . $request->fullUrl() . ']';

                $filename = 'api_logger-' . date('Y-m-d') . '.log';
               //  Storage::append('activity_logs' . DIRECTORY_SEPARATOR . $filename, $log );
           // }
            Log::info($log);
        }

    }
}
