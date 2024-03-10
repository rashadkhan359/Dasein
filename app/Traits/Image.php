<?php

namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        }
    }
}
