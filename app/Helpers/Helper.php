<?php 
namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

Class Helper 
{
    /**
     * Get request value
     *
     * @param string $requestKey
     * @param string $headerKey
     * @return string|null
     */
    public static function getRequestValue($requestKey, $headerKey)
    {
        $value = null;
        if ($requestKey !== null) {
            $value = request()->input($requestKey);
        }
        if ($value === null && $headerKey !== null) {
            $value = request()->header($headerKey);
        }

        return $value;
    }
}