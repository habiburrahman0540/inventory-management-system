<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function getallproductbycatid($id){
        $product = Product::where('category_id',$id)->get();
        return response()->json($product);
    }
}
