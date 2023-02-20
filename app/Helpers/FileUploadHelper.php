<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

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

    public static function uploadFileWithResize(UploadedFile $file, string $directory, ?string $prefix = null, ?int $width = null, ?int $height = null)
    {
        $filename = $prefix . time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs($directory, $filename, 'public');

        if ($width && $height) {
            $resizedImage = Image::make(public_path('storage/' . $path))->fit($width, $height);
            $resizedImagePath = $directory . '/' . $prefix . time() . '_' . $width . 'x' . $height . '_' . $file->getClientOriginalName();
            $resizedImage->save(public_path('storage/' . $resizedImagePath));
            return $resizedImagePath;
        }
        return $path;
    }

}
