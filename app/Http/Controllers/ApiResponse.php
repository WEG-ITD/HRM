<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiResponse extends Controller
{
    const STATUS_OK = 200;
    const STATUS_BAD_REQUEST = 400;
    const STATUS_UNAUTHORIZED = 401;
    const STATUS_FORBIDDEN = 403;
    const STATUS_NOT_FOUND = 404;
    const STATUS_REQUEST_TIMEOUT = 408;
    const STATUS_INTERNAL_ERROR_SERVER = 500;

    const TITLE_OK = 'OK';
    const TITLE_BAD_REQUEST = 'Bad Request';
    const TITLE_UNAUTHORIZED = 'Unauthorized';
    const TITLE_FORBIDDEN = 'Forbidden';
    const TITLE_NOT_FOUND = 'Not Found';
    const TITLE_REQUEST_TIMEOUT = 'Request Timeout';
    const TITLE_INTERNAL_ERROR_SERVER = 'Internal Server Error';

    /**
     * Get API error format
     *
     * @param null $title
     * @param null $code
     * @param null $message
     * @return array
     */
    public static function getFormat($title = null, $code = null, $message = null)
    {
        if ($code==200) {
            $data = [
                'title' => $title,
                'status' => $code,
                'data' => $message
            ];
        } else {
            $data = [
                'title' => $title,
                'status' => $code,
                'error' => [
                    'message' => $message
                ]
            ];
        }

        return $data;
    }

    /**
     * Response JSON bad request
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public static function responseBadRequest($message, $code = self::STATUS_BAD_REQUEST)
    {
        $data = self::getFormat(self::TITLE_BAD_REQUEST, $code, $message);
        return self::responseJson($data, self::STATUS_BAD_REQUEST);
    }

    /**
     * Response JSON unauthorized
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public static function responseUnauthorized($message, $code = self::STATUS_UNAUTHORIZED)
    {
        $data = self::getFormat(self::TITLE_UNAUTHORIZED, $code, $message);
        return self::responseJson($data, self::STATUS_UNAUTHORIZED);
    }

    /**
     * Response JSON forbidden
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public static function responseForbidden($message, $code = self::STATUS_FORBIDDEN)
    {
        $data = self::getFormat(self::TITLE_FORBIDDEN, $code, $message);
        return self::responseJson($data, self::STATUS_FORBIDDEN);
    }

    /**
     * Response JSON not found
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public static function responseNotFound($message, $code = self::STATUS_NOT_FOUND)
    {
        $data = self::getFormat(self::TITLE_NOT_FOUND, $code, $message);
        return self::responseJson($data, self::STATUS_NOT_FOUND);
    }

    /**
     * Response JSON internal server error
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public static function responseInternalServerError($message, $code = self::STATUS_INTERNAL_ERROR_SERVER)
    {
        $data = self::getFormat(self::TITLE_INTERNAL_ERROR_SERVER, $code, $message);
        return self::responseJson($data, self::STATUS_INTERNAL_ERROR_SERVER);
    }

    /**
     * Print out JSON data
     *
     * @param array $data
     * @param int $code
     */
    public static function responseJson($data, $code = 200)
    {
        response()->json($data, $code)->send();
    }
}
