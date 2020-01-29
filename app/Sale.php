<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product_id', 'customer_id', 'quantity', 'discount', 'saleAmount','status'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}
