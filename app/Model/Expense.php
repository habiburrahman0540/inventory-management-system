<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    
    protected $fillable = [
        'expense_name', 'details', 'amount','expense_date',
    ];
}
