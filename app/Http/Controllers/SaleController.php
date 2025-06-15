<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\dailyOrders;
use App\Http\Requests\dailyOrdersRequest;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use App\Imports\SalesImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Readers\LaravelExcelReader;

class SaleController extends Controller
{
    public function index()
    {
        $branches = Shop::where('user_id',currentUser()->id)->get();
        return view('dashboard.daily-sales',compact('branches'));
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
        $neccessary_amount = collect($request->expenses)->sum('amount');
        $saveData = Sale::create([
            'branch_id' => $request['branch_id'],
            'date' => $request['date'],
            'total_cash' => $request['cash_amount'],
            'total_gpay' => $request['online_amount'],
            'collection' => $request['collection'],
            'essentials_amount' => $neccessary_amount,
            'material_amount' => $request['material_amount']
        ]);
        $saveData->dailyExpenses()->createMany($request->expenses);
        return redirect()->route('user.dashboard');
    }
    public function exportToExcel()
    {
        return view('dashboard.export_to_excel');
    }
    public function downloadSampleExcel()
    {
        $filePath = 'export_sale.xlsx';

        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found.');
        }
        
        return Storage::disk('public')->download($filePath, 'sample.xlsx');
        return redirect()->back();
    }
    public function saveExportToExcel(Request $request)
    {
        $file = $request->file('export_file'); 
        Excel::import(new SalesImport, $file);

        return back()->with('success', 'Excel file imported successfully');
    }
}
