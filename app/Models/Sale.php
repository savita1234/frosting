<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table ='sales';
    protected $fillable = [
        'branch_id',
        'date',
        'total_sale',
        'total_cash',
        'total_gpay',
        'collection',
        'essentials_amount',
        'material_amount'
    ];

    
}
