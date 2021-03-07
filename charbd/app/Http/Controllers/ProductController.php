<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return ProductResource::collection(Product::paginate());
    }

    public function show(int $id)
    {   
        return new ProductResource(Product::find($id));
    }

    public function store(Request $request)
    {
        
    }

    public function update(Request $request)
    {
        $image = $request->file('image');
        $image_name = Str::random(10);
        $image_path = Storage::putFileAs('imgages', $image, $image_name . '.' . $image->extension());
        $product = Product::create($request->only('title', 'description', 'price') + [ 'image' => env('APP_URL') . $image_path]);
        // dump($image_name);
        // dump($image_path);
        // Log::channel('single')->debug("this is my log message");
        // return response($product, Response::HTTP_CREATED);
        return $image_path . $image_name;
    }

    public function destroy(int $id)
    {
        Product::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
