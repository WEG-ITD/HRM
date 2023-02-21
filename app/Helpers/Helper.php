<?php
namespace App\Helpers;

use stdClass;
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

    /**
    * Extract day, month, year, and full date from a timestamp.
    *
    * @param string $timestamp
    * @return object
    */
    public static function extractDate($timestamp, $format = 'd-M-Y', $time = 'H:i:s A.')
    {
        $date = strtotime($timestamp);
        $day = date('d', $date);
        $month = date('F', $date);
        $year = date('Y', $date);
        $fullDate = date($format, $date);
        $fullTime = date($time, $date);

        $result = new \stdClass();
        $result->day = $day;
        $result->month = $month;
        $result->year = $year;
        $result->fullDate = $fullDate;
        $result->fullTime = $fullTime;

        return $result;
    }
}
