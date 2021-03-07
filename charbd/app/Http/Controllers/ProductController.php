<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageCreateRequest;
use App\Http\Requests\ProductCreateRequest;
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

    public function store(ProductCreateRequest $request)
    {
        $product = Product::create($request->only('title', 'description', 'price', 'image'));
        return response($product, Response::HTTP_CREATED);
    }

    public function update(Request $request)
    {
       
    }

    public function destroy(int $id)
    {
        Product::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
