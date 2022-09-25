<?php

namespace App\Http\Resources;

use App\Models\Orders;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * Get all orders
     *
     *
     * */
    public function index()
    {
        return response()->json(Orders::all());
    }

    /**
     * create a new order
     *
     * @param  \Illuminate\Http\Request  $request
     * */
    public function store($request)
    {
//        $request->validate([
//
//        ]);

        $newOrder = new Orders([
            'vehicle_id' => $request->get('name'),
            'chosen_volume' => $request->get('chosen_volume'),
            'days' => $request->get('days'),
            'kilometers' => $request->get('kilometers'),
            'total_price' => $request->get('total_price'),
        ]);

        $newOrder->save();
    }
}
