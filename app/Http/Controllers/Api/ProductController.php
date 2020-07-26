<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $product = Product::join('categories','products.category_id','categories.id')
                    ->join('suppliers','products.supplier_id','suppliers.id')
                    ->select('categories.category_name','suppliers.name','products.*')
                    ->orderBy('products.id','DESC')
                    ->get();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'product_name' => 'required|max:255',
            'category_id' => 'required',
            'product_code' => 'required',
            'root' => 'required',
            'buying_price' => 'required',
            'supplier_id' => 'required',
            'buying_date' => 'required',
            'product_quantity' => 'required',
        ]);

        if($request->image){
                $position = strpos($request->image,';');
                $sub = substr($request->image,0, $position);
                $ext = explode('/',$sub)[1];
                $name =time().".".$ext;
                $image = Image::make($request->image)->resize(250,250);
                $upload_path = "backend/img/product/";
                $image_url =  $upload_path.$name;
                $image->save($image_url);
                $product = new Product();
                $product->product_name = $request->product_name;
                $product->category_id = $request->category_id;
                $product->product_code = $request->product_code;
                $product->root = $request->root;
                $product->buying_price = $request->buying_price;
                $product->supplier_id = $request->supplier_id;
                $product->buying_date = $request->buying_date;
                $product->product_quantity = $request->product_quantity;
                $product->image = $image_url ;
                $product->selling_price = $request->selling_price;
               
                $product->save();
        }else{
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->product_code = $request->product_code;
            $product->root = $request->root;
            $product->buying_price = $request->buying_price;
            $product->supplier_id = $request->supplier_id;
            $product->buying_date = $request->buying_date;
            $product->product_quantity = $request->product_quantity;
            $product->selling_price = $request->selling_price;          
            $product->save();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $photo = $product->image;
        if($photo){
            unlink($photo);
            Product::where('id',$id)->delete();
        }else{
            Product::where('id',$id)->delete();
        }
    }
}
