<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Pos;
use App\Model\Product;
use Illuminate\Http\Request;

class CardController extends Controller
{
  public function addToCard(Request $request ,$id){
        $product = Product::where('id',$id)->first();
        $check = Pos::where('product_id',$id)->first();
        if($check){
            Pos::where('product_id',$id)->increment('product_quantity');
            $Pos = Pos::where('product_id',$id)->first();
        $subtotal = $Pos->product_quantity * $Pos->product_price;
        $Pos->update(['sub_total'=>$subtotal ]);
        }else{
            $card = new Pos();
        $card->product_id = $id;
        $card->product_name = $product->product_name;
        $card->product_quantity = 1;
        $card->product_price = $product->selling_price;
        $card->sub_total =$product->selling_price;
        $card->save();
        }
        

    }
    public function productshowtocard(){
        $pos = Pos::get();
        return response()->json($pos);
    }
    public function removeitems($id){
            $pos = Pos::where('id',$id)->delete();
            return response('item deleted from card');
    }
    public function proincrement($id){
        Pos::find($id)->increment('product_quantity');
            $Pos =  Pos::find($id);
        $subtotal = $Pos->product_quantity * $Pos->product_price;
        $Pos->update(['sub_total'=>$subtotal ]);
        
    }
    public function prodecrement($id){
        Pos::find($id)->decrement('product_quantity');
        $Pos =  Pos::find($id);
    $subtotal = $Pos->product_quantity * $Pos->product_price;
    $Pos->update(['sub_total'=>$subtotal ]);
    }
}
