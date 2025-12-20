<?php

namespace App\Http\Utils;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageManagement
{
    public static function uploadImage($request, $type)
    {

        if ($request instanceof UploadedFile):
            if ($type === 'image'):
                self::deleteImage($request->image);
                $imagePath = self::generateImageName($request, 'articles/images');
                return $imagePath;
            endif;
            if ($type === 'video'):
                self::deleteImage($request->video);
                $videoPath = self::generateImageName($request, 'articles/videos');
                return $videoPath;
            endif;
        endif;

    }

    protected static function deleteImage($image)
    {
        if (File::exists(public_path($image))):
            File::delete(public_path($image));
        endif;
    }

    protected static function generateImageName($file, $path)
    {
        $fileName = Str::uuid() . time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('uploads/' . $path, $fileName, ['disk' => 'store']);

    }

}
