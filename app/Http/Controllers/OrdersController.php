<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Orders::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Orders $orders, Vehicles $vehicles)
    {
        $vehicle = $vehicles->findOrFail($request->get('vehicle_id'));

        if ($request->get('chosen_volume') > $vehicle->volume_max)
        {
            return response('chosen volume greater vehicle capacity');
        }

        //generate uuid for customers
        $uuid = (string) Str::uuid();

        // calculate total price
        // (≈km * km_price) + (day * daily_price)
        $orders->uuid = $uuid;
        $orders->vehicle_id = $request->get('vehicle_id');
        $orders->chosen_volume = $request->get('chosen_volume');
        $orders->days = $request->get('days');
        $orders->kilometers = $request->get('kilometers');
        $orders->total_price = (round($request->get('kilometers') * $vehicle->km_price) + ($request->get('days') * $vehicle->daily_price));

        $orders->save();

        return response()->json([
            'uuid' => $uuid,
            'message' => "Order has been created, use the uuid to interact with your order",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders, $uuid)
    {
        return response()->json($orders->findOrFail($uuid));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Orders $orders, Vehicles $vehicles, $uuid)
    {
        $order = $orders->findOrFail($uuid);
        $vehicle = $vehicles->findOrFail($request->get('vehicle_id'));

        if ($request->get('chosen_volume') > $vehicle->volume_max)
        {
            return response('chosen volume greater vehicle capacity');
        }

        $order->vehicle_id = $request->get('vehicle_id');
        $order->chosen_volume = $request->get('chosen_volume');
        $order->days = $request->get('days');
        $order->kilometers = $request->get('kilometers');
        $order->total_price = (round($request->get('kilometers') * $vehicle->km_price) + ($request->get('days') * $vehicle->daily_price));

        $order->save();

        return response()->json([
            'uuid' => $uuid,
            'message' => "order has been updated",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders, $uuid)
    {
        $orders->findOrFail($uuid)->delete();

        return response("order has been removed");
    }
}
