<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_name', 'order_email', 'order_address', 'order_total'
    ];
}
