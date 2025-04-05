<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'address',
        'city',
        'country',
        'state',
        'pincode',
        'landmark'
    ];
    
    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
