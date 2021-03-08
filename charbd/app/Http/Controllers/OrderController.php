<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::paginate());
    }

    public function show(int $id)
    {
        return response(new OrderResource(Order::find($id)), Response::HTTP_OK);
    }

}
