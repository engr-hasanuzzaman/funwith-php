<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return Product::paginate();
    }

    public function show(int $id)
    {   
        return Product::find($id);
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
