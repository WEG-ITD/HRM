<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Http\Controllers\ApiResponse;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // Error message
            $response = ApiResponse::getFormat(
                ApiResponse::TITLE_UNAUTHORIZED,
                ApiResponse::STATUS_UNAUTHORIZED,
                __('common.unauthenticated')
            );
            // print out
            return response()->json($response, ApiResponse::STATUS_OK);
        }
    }
}
