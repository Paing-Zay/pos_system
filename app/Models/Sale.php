<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SaleItem;

class Sale extends Model
{
    protected $guarded = [];

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}
