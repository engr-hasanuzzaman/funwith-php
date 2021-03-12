<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageCreateRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('view', 'products');
        return ProductResource::collection(Product::paginate());
    }

    public function show(int $id)
    {   
        Gate::authorize('view', 'products');
        return new ProductResource(Product::find($id));
    }

    public function store(ProductCreateRequest $request)
    {
        Gate::authorize('edit', 'products');
        $product = Product::create($request->only('title', 'description', 'price', 'image'));
        return response($product, Response::HTTP_CREATED);
    }

    public function update(Request $request)
    {
       
    }

    public function destroy(int $id)
    {
        Gate::authorize('edut', 'products');
        Product::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
