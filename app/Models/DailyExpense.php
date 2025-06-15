<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyExpense extends Model
{
    protected $fillable = [
        'sale_id',
        'expense_description',
        'amount',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    
}
