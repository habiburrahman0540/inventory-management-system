<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Product;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{

    public function todaysales(){

        $data = date('d/m/Y');
        
        $order =  Order::join('customers','orders.customer_id','customers.id')
                ->where('order_date',$data)
                ->select('customers.name','orders.*')
                ->orderBy('orders.id','DESC')
                ->get();
        return response()->json($order);


    }
    public function monthlysales(){

        $data = date('F');
        
        $order =  Order::join('customers','orders.customer_id','customers.id')
                ->where('order_month',$data)
                ->select('customers.name','orders.*')
                ->orderBy('orders.id','DESC')
                ->get();
        return response()->json($order);


    }
    public function yearlysales(){

        $data = date('Y');
        
        $order =  Order::join('customers','orders.customer_id','customers.id')
                ->where('order_year',$data)
                ->select('customers.name','orders.*')
                ->orderBy('orders.id','DESC')
                ->get();
        return response()->json($order);


    }
    
    public function totaldue(){

        $data = date('Y');
        
        $total =  Order::where('order_year',$data)->sum('due');
        return response()->json($total);
    }
    public function todaytotaldue(){

        $data = date('d/m/Y');
        
        $total =  Order::where('order_date',$data)->sum('due');
        return response()->json($total);
    }
    public function alltotalproduct(){

        $total =  Product::sum('product_quantity');
        return response()->json($total);
    }
    public function alltotaldue(){
        $total =  Order::sum('due');
        return response()->json($total);
    }
    public function todaytotalsales(){

        $data = date('d/m/Y');
        
        $total =  Order::where('order_date',$data)->sum('total');
        return response()->json($total);
    }
    
    public function monthlytotalsales(){

        $data = date('F');
        
        $total =  Order::where('order_month',$data)->sum('total');
        return response()->json($total);
    }
    public function yearlytotalsales(){

        $data = date('Y');
        
        $total =  Order::where('order_year',$data)->sum('total');
        return response()->json($total);
    }
    public function todaytotalcollection(){

        $data = date('d/m/Y');
        
        $todaypay =  Order::where('order_date',$data)->sum('pay');
        return response()->json($todaypay);
    }
    public function orderdetails($id){
        $customerdata = Order::join('customers','orders.customer_id','customers.id')
                    ->where('orders.id',$id)
                    ->select('customers.name','customers.email','customers.phone','customers.address','orders.*')
                    ->first();
        return response()->json($customerdata);
    }
    public function allorderdetails($id){
        $productdetails = OrderDetails::join('products','order_details.product_id','products.id')
                        ->where('order_details.order_id',$id)
                        ->select('products.product_name','products.product_code','order_details.*')
                        ->get();
                        return response()->json($productdetails);
    }

}