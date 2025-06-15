<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Shop;
use App\Models\Sale;
use App\Models\Branch;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $branches = Shop::where('user_id', currentUser()->id)->get();
        $selectedBranchId = $request->get('branch_id') ?? $branches->first()->id;
        $query = Sale::with('shop')->where('branch_id', $selectedBranchId);
        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }
        $salesData = $query->orderBy('date', 'desc')->paginate(10);
        return view('dashboard.dashboard', compact('salesData', 'branches', 'selectedBranchId'));
    }

    public function shopDetails()
    {
        return view('dashboard.shop-details');
    }
    public function saveShopData(Request $request)
    {
        // dd(currentUser()->id);
        // dd($request);
        $branchcount = 1;
        $branchString = substr($request['shop_name'],0,8);

        foreach($request['branches'] as $branch){
            $storeDetails = Shop::create([
                'shop_name' => $request['shop_name'],
                'shop_type' => $request['shop_type'],
                'user_id' => currentUser()->id,
                'branch_unique_id' => $branchString.'_'.$branchcount,
                'no_of_branches' => $branchcount,
                'address' => $branch['address'],
                'city' =>  $branch['city'],
                'country' =>  $branch['country'],
                'state' =>  $branch['state'],
                'pincode' =>  $branch['pincode'],
                // 'landmark' =>  $branch['landmark'],
            ]);
            $branchcount++;
        }
        return redirect()->route('dashboard');
    }
    public function profile()
    {
        $user = currentUser();
        $details = Shop::where('user_id',currentUser()->id)->get();
        return view('user.profile',compact('user','details'));
    }
    public function branches()
    {
        return view('dashboard.add-branches');
    }
}
