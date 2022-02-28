<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    public function imageUpload(Request $request){
        $validator = Validator::make($request->all(), [
            'image_type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Unable to upload image',
                'error' => $validator->errors()
            ]);
        }
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        return response()->json([
            'status' => 200,
            'message' => 'Image uploaded successfully',
            'image' => $imageName
        ]);
    }
}
