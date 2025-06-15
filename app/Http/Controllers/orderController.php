<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyOrder;
class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //write a function to create a new order
        $dailyOrder = DailyOrder::create([
            'branch_id' => request('branch_id'),
            'cake_in_kg' => request('cake_in_kg'),
            'flavour' => request('flavour'),
            'total_amount' => request('total_amount'),
            'advanced_amount' => request('advanced_amount'),
            'balanced_amount' => request('balanced_amount'),
            'customer_name' => request('customer_name'),
            'customer_number' => request('customer_number'),
            'delivery_date' => request('delivery_date')
        ]);
         return redirect()->route('dashboard');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
