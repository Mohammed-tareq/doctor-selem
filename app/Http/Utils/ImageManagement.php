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
                $imagePath = self::generateImageName($request, 'articles/images');
                return $imagePath;
            endif;
            if ($type === 'video'):
                $videoPath = self::generateImageName($request, 'articles/videos');
                return $videoPath;
            endif;
            if ($type === 'audio'):
                $audioPath = self::generateImageName($request, 'audios');
                return $audioPath;
            endif;
        endif;

    }

    public static function storeBlogImage($request, $blog)
    {
        if ($blog && ($request->hasFile('image_cover') || $request->has('image_content'))):
            if ($request->hasFile('image_cover')) {
                $coverPath = self::generateImageName($request->image_cover, 'Blogs');
                self::deleteImage($blog->image_cover);
            }
            if ($request->hasFile('image_content')) {
                $contentPath = self::generateImageName($request->image_content, 'Blogs');
                self::deleteImage($blog->image_content);
            }

            $blog->update([
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
            $coverPath = self::generateImageName($request->image_cover, 'Projects');
            if (!$coverPath) return;
            self::deleteImage($project->image_cover);
            $project->update([
                'image_cover' => $coverPath,
            ]);
        endif;
    }

    public static function StoreUserImage($request, $user)
    {
        if ($user && $request->hasFile('image_cover')) {
            self::deleteImage($user->image_cover);
            $coverPath = self::generateImageName($request->image_cover, 'Users');
            $user->update(['image_cover' => $coverPath]);
        }

        $path = [];
        if ($user && $request->hasFile('images')) {
            if ($user->images && is_array($user->images)) {
                foreach ($user->images as $oldImage) {
                    self::deleteImage($oldImage);
                }
            }
            foreach ($request->images as $index => $image) {
                $path[] = self::generateImageName($image, 'Users');
            }
            $user->update(['images' => $path]);

            if ($user && $request->hasFile('cv')) {
                self::deleteImage($user->cv);
                $cvPath = self::generateImageName($request->cv, 'Users/cv');
                $user->update(['cv' => $cvPath]);
            }
        }
    }

    public static function StoreSettingImage($request, $setting)
    {
        if ($setting && $request->hasFile('logo')):
            self::deleteImage($setting->logo);
            $logoPath = self::generateImageName($request->logo, 'settings');
            $setting->update(['logo' => $logoPath]);
        endif;
        if ($setting && $request->hasFile('favicon')):
            self::deleteImage($setting->favicon);

            $iconPath = self::generateImageName($request->favicon, 'settings');
            $setting->update(['favicon' => $iconPath]);
        endif;
    }

    public
    static function deleteImage($image)
    {
        if (File::exists(public_path($image))):
            File::delete(public_path($image));
        endif;
    }

    protected
    static function generateImageName($file, $path)
    {
        $fileName = Str::uuid() . time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('uploads/' . $path, $fileName, ['disk' => 'store']);

    }

}
