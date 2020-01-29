<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'updated_at'];

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }
}
