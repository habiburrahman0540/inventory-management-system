<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Customer;
use Illuminate\Http\Request;
use Image;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return response()->json($customer);
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
            'email' => 'required|Unique:customers|max:255',
            'phone' => 'required|Unique:customers',
            
        ]);

        if($request->photo){
                $position = strpos($request->photo,';');
                $sub = substr($request->photo,0, $position);
                $ext = explode('/',$sub)[1];
                $name =time().".".$ext;
                $image = Image::make($request->photo)->resize(250,250);
                $upload_path = "backend/img/customer/";
                $image_url =  $upload_path.$name;
                $image->save($image_url);
                $customer = new Customer();
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->address = $request->address;
                $customer->photo = $image_url ;
               
                $customer->save();
        }else{
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            
            $customer->save();

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
        $customer = Customer::where('id',$id)->first();
        return response()->json($customer);
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
        $customer = Customer::find($id);
        
        $image = $request->photo;
    
            if($image  != $customer->photo){
                $position = strpos($image,';');
                $sub = substr($image,0, $position);
                $ext = explode('/',$sub)[1];
                $name =time().".".$ext;
                $img = Image::make($image)->resize(250,250);
                $upload_path ="backend/img/customer/";
                $image_url =  $upload_path.$name;
                $oldimg = $customer->photo;
                $img->save($image_url);
                if($oldimg){
                   
                    @unlink($oldimg);
                    $img->save();
                }
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->address = $request->address;
                $customer->photo =   $image_url;
                $customer->save();
                
        }else{
         
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();
    
        }
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::where('id',$id)->first();
        $photo = $customer->photo;
        if($photo){
            unlink($photo);
            Customer::where('id',$id)->delete();
        }else{
            Customer::where('id',$id)->delete();
        }
    }
}
