<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dailyOrders extends Model
{
    protected $table = 'daily_orders';
    protected $fillable = [
         'branch_id',
            'cake_in_kg',
            'flavour',
            'total_amount',
            'advanced_amount',
            'balanced_amount',
            'customer_name',
            'customer_number',
            'delivery_date'
    ];
}
