<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Shop;
use App\Models\Branch;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function shopDetails(Request $request)
    {
        $storeShopDetails = Shop::create([
            'shop_name' => $request['shop_name'],
            'shop_type' => $request['shop_type'],
            'no_of_branches' => $request['no_of_branches'],
            'user_id' => $request['user_id']
        ]);
        $branchcount = 1;
        $branchString = substr($storeShopDetails['shop_name'],0,5);

        foreach($request['branches'] as $branch){
            $storeBranchDetails = $storeShopDetails->branch()->create([
                'branch_name' =>  $branchString.'_'.$branchcount,
            ]);
            $storeBranchAddress = $storeBranchDetails->address()->create([
                'address' => $branch['address'],
                'city' =>  $branch['city'],
                'country' =>  $branch['country'],
                'state' =>  $branch['state'],
                'pincode' =>  $branch['pincode'],
                'landmark' =>  $branch['landmark'],
            ]);
            $branchcount++;
        }
        return response()->json(['user' => $storeBranchAddress, 'status' => 200]);
    }



    public function storeSalesPerDay(Request $request)
    {
        

    }
    public function generateUniqueNameForBranch($shopDetails)
    {
        $name = substr($shopDetails['shop_name'],5);


    }
}
