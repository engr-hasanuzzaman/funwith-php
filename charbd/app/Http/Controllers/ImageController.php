<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function store(ImageCreateRequest $request)
    {
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName() . '_' . Str::random(10);
        $image_extention = $image->extension();
        $path = Storage::putFileAs('images', $image, $image_name . '.' . $image_extention);
        return response(['url' => env('APP_URL') . '/app/' . $path]);
    }
}
