<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

trait Image
{
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
        return $path . '/' . $fileName;
    }


    /**
     * Remove the image
     * @param string
     * @return null
     */
    public function destroyImage($filePath)
    {
        $fullPath = public_path($filePath);
        if (File::exists($fullPath)) {
            // Delete the file from the server
            File::delete($fullPath);
            // Optionally, you can also remove the file entry from the database if needed
            // Your code here...
            return response()->json(['message' => 'File deleted successfully.'], Response::HTTP_OK);
        }else{
            return response()->json(['message' => 'File not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}
