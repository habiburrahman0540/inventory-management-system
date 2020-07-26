<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Supplier;
use Illuminate\Http\Request;
use Image;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
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
            'name' => 'required|max:255',
            'email' => 'required|Unique:suppliers|max:255',
            'phone' => 'required|Unique:suppliers',
            
        ]);

        if($request->photo){
                $position = strpos($request->photo,';');
                $sub = substr($request->photo,0, $position);
                $ext = explode('/',$sub)[1];
                $name =time().".".$ext;
                $image = Image::make($request->photo)->resize(250,250);
                $upload_path = "backend/img/supplier/";
                $image_url =  $upload_path.$name;
                $image->save($image_url);
                $supplier = new Supplier();
                $supplier->name = $request->name;
                $supplier->email = $request->email;
                $supplier->phone = $request->phone;
                $supplier->address = $request->address;
                $supplier->photo = $image_url ;
                $supplier->shopname = $request->shopname;
                $supplier->save();
        }else{
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            $supplier->shopname = $request->shopname;
            $supplier->save();

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
        $supplier = Supplier::where('id',$id)->first();
        return response()->json($supplier);
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
        $supplier = Supplier::find($id);
        
        $image = $request->photo;
    
            if($image  != $supplier->photo){
                $position = strpos($image,';');
                $sub = substr($image,0, $position);
                $ext = explode('/',$sub)[1];
                $name =time().".".$ext;
                $img = Image::make($image)->resize(250,250);
                $upload_path ="backend/img/supplier/";
                $image_url =  $upload_path.$name;
                $oldimg = $supplier->photo;
                $img->save($image_url);
                if($oldimg){
                   
                    @unlink($oldimg);
                    $img->save();
                }
                
                
        }else{
         
            $name = $supplier->photo;
    
        }
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->photo =   $image_url;
        $supplier->shopname = $request->shopname;
        $supplier->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::where('id',$id)->first();
        $photo = $supplier->photo;
        if($photo){
            unlink($photo);
            Supplier::where('id',$id)->delete();
        }else{
            Supplier::where('id',$id)->delete();
        }
    }
}
