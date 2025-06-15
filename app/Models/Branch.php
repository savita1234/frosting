<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
 

class Branch extends Model
{
    protected $table = 'branches';
    protected $fillable = [
        'shop_id',
        'branch_name'
    ];
    public function address(): morphMany
    {
        return $this->morphMany(address::class, 'addressable');
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
    
}
