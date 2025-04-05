<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Shop;


class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
        dd('heelo');
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
        $branchString = substr($request['shop_name'],0,5);

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
}
