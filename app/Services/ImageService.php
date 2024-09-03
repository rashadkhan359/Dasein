<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class ImageService{
        /**
     * @param File | string
     * @return string
     */
    public function storeImage($file, $path)
    {
        $ext = $file->getClientOriginalExtension();
        $fileName = 'media_' . uniqid() . '.' . $ext;

        // Save the file to the desired location
        $file->storeAs($path, $fileName, 'public');

        // Return the file path for further use
        return "{$path}/{$fileName}";
    }


    public static function deleteFromUrl($imageUrl)
    {
        $filePath = parse_url($imageUrl, PHP_URL_PATH);
        self::deleteFromPath($filePath);
    }

    /**
     * Remove the image
     * @param string
     * @return \Illuminate\Http\JsonResponse
     */
    public static function deleteFromPath($filePath)
    {
        $fullPath = public_path($filePath);
        if (File::exists($fullPath)) {
            File::delete($fullPath);
            return response()->json(['message' => 'File deleted.'], Response::HTTP_OK);
        }
        return response()->json(['message' => 'File not found.'], Response::HTTP_NOT_FOUND);
    }
}
