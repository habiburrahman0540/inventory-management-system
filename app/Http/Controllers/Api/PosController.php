<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Pos;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function getallproductbycatid($id){
        $product = Product::where('category_id',$id)->get();
        return response()->json($product);
    }
    public function orderdone(Request $request){
        $validation = $request->validate([
            'customer_id' => 'required',
            
        ]);
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->qty = $request->qty;
        $order->subtotal = $request->subtotal;
        $order->pay = $request->pay;
        $order->due = $request->due;
        $order->payby = $request->payby;
        $order->vat = $request->vat;
        $order->total = $request->total;
        $order->order_date = date('d/m/Y');
        $order->order_month = date('F');
        $order->order_year = date('Y');
        $order->save();
        $contents = Pos::get();
        $order_details = new OrderDetails();
        foreach ($contents as $content){
            $order_details->order_id = $order->id;
            $order_details->product_id = $content->product_id;
            $order_details->product_quantity = $content->product_quantity;
            $order_details->product_price = $content->product_price;
            $order_details->subtotal = $content->sub_total;
            $order_details->save();
          
            
            Product::where('id',$content->product_id)->update(['product_quantity'=> DB::raw('product_quantity -'.$content->product_quantity)]); 

        }
        
       
        DB::table('pos')->delete();
        return response('done');
    }
}
