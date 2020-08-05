<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'qty', 'subtotal','pay', 'due', 'payby', 'vat','total', 'order_date', 'order_month', 'order_year',
    ];
    
}
