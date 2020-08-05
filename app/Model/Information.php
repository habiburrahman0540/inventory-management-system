<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'vat', 'logo', 'name','year', 'phone','email','address',
    ];
}
