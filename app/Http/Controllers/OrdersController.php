<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vehicles $vehicles)
    {
        $vehicle = $vehicles->findOrFail($request->get('vehicle_id'));

        if ($request->get('chosen_volume') > $vehicle->volume_max)
        {
            return response('chosen volume greater vehicle capacity');
        }

        // calculate total price
        // (≈km * km_price) + (day * daily_price)
        $newOrder = new Orders([
            'vehicle_id' => $request->get('vehicle_id'),
            'chosen_volume' => $request->get('chosen_volume'),
            'days' => $request->get('days'),
            'kilometers' => $request->get('kilometers'),
            'total_price' => (round($request->get('kilometers') * $vehicle->km_price) + ($request->get('days') * $vehicle->daily_price)),
        ]);

        $newOrder->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
