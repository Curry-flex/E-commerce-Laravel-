<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Requests;
use DB;
use App\Http\Requestss;
use Session;
use Illuminate\Support\Facades\Redirect;

class ManufactureController extends Controller
{
    public function index(){
        $this->authenticateAdmin();
        return view('admin.manufacture');
    }

    public function addManufacture(Request $request){
        $this->authenticateAdmin();
        $data =array();

        $data['manufacture_id'] =$request->manufacture_id;
        $data['manufacture_name'] =$request->manufacture_name;
        $data['manufacture_description'] =$request->manufacture_description;
        $data['manufacture_status'] =$request->manufacture_status;

        DB::table('manufacture')
                ->insert($data);
         
        Session::put("message" , "Record Added successfully");
        
        return Redirect::to("/manufacture");
    }

    public function allManufacture()
    {
        $this->authenticateAdmin();
        $allManufacture = DB::table('manufacture')->get();
        return view('admin.allManufacture')->with("manufacture",$allManufacture);
    }


    public function unactive($manufacture_id){
        $this->authenticateAdmin();
        DB::table('manufacture')
              ->where("manufacture_id", $manufacture_id)
              ->update(["manufacture_status" => "NULL"]);

              return Redirect::to('/allManufacture');
    }

    
    public function active($manufacture_id){
        $this->authenticateAdmin();
        DB::table('manufacture')
              ->where("manufacture_id", $manufacture_id)
              ->update(["manufacture_status" => "on"]);
              return Redirect::to('/allManufacture');
    }


    public function viewEdit($manufacture_id)
    {
        $this->authenticateAdmin();
        $data=DB::table('manufacture')
              ->where("manufacture_id",$manufacture_id)
              ->first();


              return view('admin.manufactureEdit')->with("editData" , $data);
    }

    public function editManufacture(Request $request ,$manufacture_id){

        $this->authenticateAdmin();
        $data = array();
        $data['manufacture_name'] = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;


        DB::table('manufacture')
           ->where("manufacture_id" ,$manufacture_id)
           ->update($data);


           return Redirect::to("/allManufacture");
    }


    public function delete($manufacture_id){

        $this->authenticateAdmin();
        DB::table('manufacture')
        ->where("manufacture_id" ,$manufacture_id)
        ->delete();

        return Redirect::to("/allManufacture");


    }

    public function authenticateAdmin()
    {
        $admin_id =session::get('admin_id');

        if($admin_id){

            return;
        }
        else{
            return Redirect::to('/admin')->send();

        }
    }
}

