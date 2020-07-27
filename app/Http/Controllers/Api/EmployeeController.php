<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Image;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

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
            'email' => 'required|Unique:employees|max:255',
            'phone' => 'required|Unique:employees',
            'nid' => 'required|Unique:employees|max:17',
        ]);

        if($request->photo){
                $position = strpos($request->photo,';');
                $sub = substr($request->photo,0, $position);
                $ext = explode('/',$sub)[1];
                $name =time().".".$ext;
                $image = Image::make($request->photo)->resize(250,250);
                $upload_path = "backend/img/employee/";
                $image_url =  $upload_path.$name;
                $image->save($image_url);
                $employee = new Employee();
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->phone = $request->phone;
                $employee->address = $request->address;
                $employee->salary = $request->salary;
                $employee->photo = $image_url ;
                $employee->nid = $request->nid;
                $employee->joining_date = $request->joining_date;
                $employee->save();
        }else{
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->salary = $request->salary;
            $employee->nid = $request->nid;
            $employee->joining_date = $request->joining_date;
            $employee->save();

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
        $employee = Employee::where('id',$id)->first();
        return response()->json($employee);
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

       
        $employee = Employee::find($id);
        
    $image = $request->photo;

        if($image  != $employee->photo){
            $position = strpos($image,';');
            $sub = substr($image,0, $position);
            $ext = explode('/',$sub)[1];
            $name =time().".".$ext;
            $img = Image::make($image)->resize(250,250);
            $upload_path ="backend/img/employee/";
            $image_url =  $upload_path.$name;
            $oldimg = $employee->photo;
            $img->save($image_url);
            if($oldimg){
               
                @unlink($oldimg);
                $img->save();
            }
                    $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->salary = $request->salary;
            $employee->photo =   $image_url;
            $employee->nid = $request->nid;
            $employee->joining_date = $request->joining_date;  
            $employee->save();
            
    }else{
     
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->nid = $request->nid;
        $employee->joining_date = $request->joining_date;  
        $employee->save();
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
        $employee = Employee::where('id',$id)->first();
        $photo = $employee->photo;
        if($photo){
            unlink($photo);
            Employee::where('id',$id)->delete();
        }else{
            Employee::where('id',$id)->delete();
        }
    }
}
