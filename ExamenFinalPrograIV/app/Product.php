<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_Product', 'description_Product', 'price_Product', 'quantity_Product'
    ];
}
