<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    protected $table = 'shop_details';
    protected $fillable = [
       'shop_name' ,
        'shop_type',
        'user_id',
        'branch_unique_id',
        'no_of_branches',
        'address' ,
        'city',
        'country',
        'state',
        'pincode',
        'landmark',
    ];

    public function address(): morphMany
    {
        return $this->morphMany(address::class, 'addressable');
    }
    public function branch(): HasMany
    {
        return $this->hasMany(branch::class, 'shop_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
