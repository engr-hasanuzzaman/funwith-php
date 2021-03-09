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

    public function export()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachments; filename=orders.csv',
            'Pragma' => 'no-cachee',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function () {
            $orders = Order::all();
            $file = fopen("php::/output", "w");
            
            // header row
            fputcsv($file, ['ID', 'Name', 'Email', 'Product Title', 'Price', 'Quantity']);

            // body
            foreach($orders as $order) {
                fputcsv($file, [$order->id, $order->name, $order->email, "", "", '']);

                foreach($order->orderItems as $item) {
                    fputcsv($file, ['', '', '', $item->product_title, $item->price, $item->quantity]);
                }
            }

            fclose($file);
        };

        return \Response::stream($callback, 200, $headers);
    }

}
