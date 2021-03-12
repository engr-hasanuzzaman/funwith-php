<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        Gate::authorize('view', 'orders');
        Gate::authorize('view', 'orders');
        return OrderResource::collection(Order::paginate());
    }

    public function show(int $id)
    {
        Gate::authorize('view', 'orders');
        return response(new OrderResource(Order::find($id)), Response::HTTP_OK);
    }

    public function export()
    {
        Gate::authorize('view', 'orders');
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachments; filename=orders.csv',
            'Cache-Control' => 'max-age=0, no-store',
        ];

        $callback = function () {
            $orders = Order::all();
            // php://output means we will write the stream data
            $file = fopen("php://output", "w");
            
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
