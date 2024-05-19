<?php

namespace App\Functions;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Upload
{
    public static function UploadFile($file, $path)
    {

        $name = time().'_'.rand(1000, 10000).'.'.$file->extension();
        $imgFile = File::get($file);

        $path = $path.'/'.$name;
        Storage::disk('public')->put($path, $imgFile);

        return '/uploads/'.$path;
    }

    public static function UploadFiles($files, $path)
    {
        $filesName = [];
        foreach ($files as $file) {
            $filesName[] = self::UploadFile($file, $path);
        }

        return $filesName;
    }

    public static function StoreUrlImage($url, $path)
    {
        $name = time().'_'.rand(1000, 10000).'.png';

        $path = '/uploads'.$path.'/'.$name;
        $imgFile = Image::make(file_get_contents($url))->insert(public_path('watermark.png'), 'bottom-right', 10, 10)->stream();
        Storage::disk('public')->put($path, $imgFile);

        return $path;
    }

    public static function deleteImage($path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }

    public static function deleteImages($paths = [])
    {
        foreach ($paths as $path) {
            self::deleteImage($path);
        }
    }
}
