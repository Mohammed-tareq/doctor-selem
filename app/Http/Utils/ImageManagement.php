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

    public static function storeBlogImage($request, $blog)
    {
        if ($book && ($request->hasFile('image_cover') || $request->has('image_content'))):
            self::deleteImage($book->image_cover);;
            self::deleteImage($book->image_content);
            $coverPath = self::generateImageName($request->image_cover, 'Blogs');
            $contentPath = self::generateImageName($request->image_content, 'Blogs');

            $book->update([
                'image_cover' => $coverPath,
                'image_content' => $contentPath,
            ]);
        endif;
    }

    public static function storeBook($request, $book)
    {
        if ($request->hasFile('images')):
            $path = [];
            foreach ($request->images as $image):
                $path[] = self::generateImageName($image, 'books');
            endforeach;
            if ($book->images):
                foreach ($book->images as $oldimages) {
                    self::deleteImage($oldimages);
                }
            endif;
            $book->update(['images' => $path]);
        endif;
        return;
    }

    public static function storeProjectImage($request, $project)
    {
        if ($project && $request->hasFile('image_cover')):
            self::deleteImage($project->image_cover);
            $coverPath = self::generateImageName($request->image_cover, 'Projects');

            $project->update([
                'image_cover' => $coverPath,
            ]);
        endif;
    }

    public static function deleteImage($image)
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
