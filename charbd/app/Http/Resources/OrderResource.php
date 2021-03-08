<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product_title' => $this->product_title,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'order_id' => $this->order_id,
            'order_items' => OrderItemResource::collection($this->order_items)
        ];
    }
}
