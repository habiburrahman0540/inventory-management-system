<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'product_quantity','product_price', 'subtotal', 
    ];
}
