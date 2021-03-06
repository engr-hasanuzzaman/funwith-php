<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
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
        
    }

    public function destroy(int $id)
    {
        Product::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
