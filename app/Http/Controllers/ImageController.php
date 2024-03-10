<?php

namespace App\Http\Controllers;

use App\Traits\Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    use Image;

    public function store(Request $request){

        $file = $request->file('file');

        $path = $request->input('path');

        $filePath = $this->storeImage($file, $path);

        // Return the saved file path
        return response()->json(['path' => $filePath], Response::HTTP_OK);
    }

    public function destroy(Request $request){

        $filePath = $request->input('file_path');

        $this->destroyImage($filePath);

    }
}
