<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\dailyOrders;
use App\Http\Requests\dailyOrdersRequest;

class SaleController extends Controller
{
    public function index()
    {
        return view('dashboard.daily-sales');
    }
    public function dailySale(Request $request)
    {
        $data = $request->all();
        $saveData = Sale::create([
            'branch_id' => $request['branch_id'],
            'date' => $request['date'],
            'total_sale' => $request['total_sale'],
            'total_cash' => $request['total_cash'],
            'total_gpay' => $request['total_gpay'],
            'collection' => $request['collection'],
            'essentials_amount' => $request['essentials_amount'],
            'material_amount' => $request['material_amount']

        ]);
        return response()->json(['success' => true, 'sale' => $saveData]);
    }
    public function dailyOrder(dailyOrdersRequest $request)
    {
        $data = $request->all();
        $saveData = dailyOrders::create([
            'branch_id' => $request['branch_id'],
            'cake_in_kg' => $request['cake_in_kg'],
            'flavour' => $request['flavour'],
            'total_amount' => $request['total_amount'],
            'advanced_amount' => $request['advanced_amount'],
            'balanced_amount' => $request['balanced_amount'],
            'customer_name' => $request['customer_name'],
            'customer_number' => $request['customer_number'],
            'delivery_date' => $request['delivery_date']
        ]);
        return response()->json(['success' => true, 'order_detail' => $saveData]);
    }
    public function saveSales(Request $request)
    {
        dd($request);
    }
}
