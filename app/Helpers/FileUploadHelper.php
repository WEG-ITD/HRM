<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class FileUploadHelper
{
    /**
     * Uploads one or multiple files to a directory
     *
     * @param  array|UploadedFile  $files  The file or files to upload
     * @param  string  $directory  The directory to upload the file to
     * @param  string|null  $prefix  The prefix to use for the file name
     * @return array|string|null  The path(s) to the uploaded file(s), or null if the upload fails
     */
    public static function uploadFile($file, $directory, $prefix = null)
    {
        // if (is_array($files)) {
        //     $paths = [];
        //     foreach ($files as $file) {
        //         $path = $this->uploadFile($file, $directory, $prefix);
        //         if ($path) {
        //             $paths[] = $path;
        //         }
        //     }
        //     return $paths;
        // }
        // if (!$files instanceof UploadedFile || !$files->isValid()) {
        //     return null;
        // }
        // if (!Storage::exists($directory)) {
        //     Storage::makeDirectory($directory);
        // }
        // $filename = $prefix ? $prefix . '_' . time() . '.' . $files->getClientOriginalExtension() : time() . '_' . $files->getClientOriginalName();
        // $path = Storage::putFileAs($directory, $files, $filename);
        // return $path ? Storage::url($path) : null;
        if ($file instanceof UploadedFile) {
            $filename = $prefix . time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs($directory, $filename, 'public');
            return $path;
        } elseif (is_array($file)) {
            $paths = [];
            foreach ($file as $singleFile) {
                $filename = $prefix . time() . '_' . $singleFile->getClientOriginalName();
                $path = $singleFile->storeAs($directory, $filename, 'public');
                $paths[] = $path;
            }
            return $paths;
        }
    }

}
