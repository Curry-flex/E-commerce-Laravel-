<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use DB;
use App\Http\Requestss;
use Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    
    public function index(){
       
        $this->authenticateAdmin();
        return view('admin.addCategory');
    }

    public function allCategory(){
        $this->authenticateAdmin();
        $categories =DB::table("tbl_category")->get();

        return view('admin.allCategory')->with("category", $categories);
    }

    public function addCategory(Request $request){
        $this->authenticateAdmin();
        $data = array();

        $data['category_id'] = $request->category_id;
        
        $data['category_name'] = $request->category_name;
        
        $data['category_description'] = $request->category_description;
        
        $data['category_status'] = $request->category_status;

        DB::table('tbl_category')->insert($data);

        Session::put("message", "Record added successfully");

        return Redirect::to('/addCategory');



    }

    public function unactive($category_id){
        $this->authenticateAdmin();
        DB::table('tbl_category')
                ->where('category_id' ,$category_id)
                ->update(['category_status' => NULL]);

                return Redirect::to('/allCategory');
    }
    

    public function active($category_id){
        $this->authenticateAdmin();
        DB::table('tbl_category')
                ->where('category_id' ,$category_id)
                ->update(['category_status' => "on"]);

                return Redirect::to('/allCategory');
    }

    public function editView($category_id){
        $this->authenticateAdmin();
        $categoryinfo = DB::table('tbl_category')
                     ->where('category_id', $category_id)
                     ->first();

           return view("admin.edit_category")->with("categoryinfo", $categoryinfo);          
    }


    public function edit(Request $request , $category_id){
        $this->authenticateAdmin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;

       DB::table('tbl_category')
               ->where("category_id" ,$category_id)
               ->update($data);

            
               return Redirect::to("/allCategory");

    }

    public function delete($category_id){
        $this->authenticateAdmin();
        DB::table('tbl_category')
               ->where('category_id', $category_id)
               ->delete();

               return Redirect::to("/allCategory");
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
