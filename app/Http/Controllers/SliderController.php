<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use DB;
use App\Http\Requestss;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index(){

        return view('admin.slider');
    }

    public function addSlider(Request $request)
    {
        $this->authenticateAdmin();

        $data =array();

        $data['slider_status'] = $request->slider_status; 
        $image =$request->file('slider_image');


        if($image){

            $image_name =Str::random(20);
            $extension=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$extension;
            $upload_path='slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

        if($success){
        $data['slider_image'] =$image_url;
        DB::table('sliders')->insert($data);
        Session::put('message','Record added successfully');

        return Redirect::to('/addSlider');


    }
}
    }

    public function allSlider()
    {
        $this->authenticateAdmin();
        $allSlider =DB::table('sliders')->get();

        return view('admin.allSlider')->with('allSlider' ,$allSlider);
    }

    public function delete($slider_id){
        $this->authenticateAdmin();
        DB::table('sliders')
            ->where("slider_id",$slider_id)
            ->delete();

                 return Redirect::to('/allSlider');
    }

    public function unactive($slider_id){
    
        $this->authenticateAdmin();
        DB::table('sliders')
              ->where("slider_id", $slider_id)
              ->update(["slider_status" => "NULL"]);

              return Redirect::to('/allSlider');
    }

    
    public function active($slider_id){
        $this->authenticateAdmin();
        DB::table('sliders')
              ->where("slider_id", $slider_id)
              ->update(["slider_status" => "on"]);
              return Redirect::to('/allSlider');
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
