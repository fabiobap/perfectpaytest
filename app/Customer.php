<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'identification_type','identification_number', 'email'];

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }
}
