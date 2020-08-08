<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Information;
use Illuminate\Http\Request;
use Image;
class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Information::all();
        return response()->json( $info);
       
    }
    public function allinformation(){
        $info = Information::first();
        return response()->json( $info);
    }
    public function vat()
    {
        $info = Information::first();
        return response()->json( $info);
       
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
        
        if($request->logo){
            $position = strpos($request->logo,';');
            $sub = substr($request->logo,0, $position);
            $ext = explode('/',$sub)[1];
            $name =time().".".$ext;
            $image = Image::make($request->logo)->resize(250,250);
            $upload_path = "backend/img/logo/";
            $image_url =  $upload_path.$name;
            $image->save($image_url);
            $data = new Information();

            $data->vat = $request->vat;
            $data->name = $request->name;
            $data->year = $request->year;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->logo = $image_url ;
           
            $data->save();
    }else{
        $data = new Information();
        $data->vat = $request->vat;
        $data->name = $request->name;
        $data->year = $request->year;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
            $data->save();

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
        $info = Information::where('id',$id)->first();
        return response()->json($info);
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
        $information = Information::find($id);
        
        $image = $request->logo;
    
            if($image  != $information->logo){
                $position = strpos($image,';');
                $sub = substr($image,0, $position);
                $ext = explode('/',$sub)[1];
                $name =time().".".$ext;
                $img = Image::make($image)->resize(250,250);
                $upload_path ="backend/img/logo/";
                $image_url =  $upload_path.$name;
                $oldimg = $information->logo;
                $img->save($image_url);
                if($oldimg){
                   
                    @unlink($oldimg);
                    $img->save();
                }
                $information->vat = $request->vat;
            $information->name = $request->name;
            $information->year = $request->year;
            $information->email = $request->email;
            $information->phone = $request->phone;
            $information->address = $request->address;
            $information->logo = $image_url ;
           
            $information->save();
                
        }else{
         
            $information->vat = $request->vat;
            $information->name = $request->name;
            $information->year = $request->year;
            $information->email = $request->email;
            $information->phone = $request->phone;
            $information->address = $request->address;
            $information->save();
    
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
        //
    }
}
