<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use DB;
use App\Http\Requestss;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
   
    public function index(){
        $this->authenticateAdmin();
        $category =DB::table('tbl_category')
                    ->where("category_status" , "on")
                    ->get();
        $manufacture = DB::table('manufacture')
                     ->where("manufacture_status" ,"on")
                     ->get();

        return view('admin.product' ,["category" => $category , "manufacture" => $manufacture]);
    }

    public function addProduct(Request $request){
        $this->authenticateAdmin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_description'] = $request->product_description;
        $data['category_id'] = $request->category_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['product_status'] = $request->product_status;
        $data['product_price'] = $request->product_price; 
        $data['product_recomend'] = $request->recomend; 

        $image =$request->file('product_image');


        if($image){

            $image_name =Str::random(20);
            $extension=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$extension;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

        if($success){
        $data['product_image'] =$image_url;
        DB::table('product')->insert($data);
        Session::put('message','Record added successfully');

        return Redirect::to('/addProduct');

         }
    }

        // $data['product_image'] =' ';
        // DB::table('product')->insert($data);
        // Session::put('message','Record added successfully');

        // return Redirect::to('/addProduct');

    }


    public function allProduct(){
        $this->authenticateAdmin();
        $productData = DB::table('product')
                     ->join("tbl_category" ,"product.category_id" ,"=" ,"tbl_category.category_id")
                     ->join("manufacture" ,"product.manufacture_id","=", "manufacture.manufacture_id")
                     ->get();

        return view('admin.allProduct')->with('product' , $productData);
    }


    public function unactive($product_id){
        $this->authenticateAdmin();
        DB::table('product')
              ->where("product_id", $product_id)
              ->update(["product_status" => "NULL"]);

              return Redirect::to('/allProduct');
    }

    
    public function active($product_id){
        $this->authenticateAdmin();
        DB::table('product')
              ->where("product_id", $product_id)
              ->update(["product_status" => "on"]);
              return Redirect::to('/allProduct');
    }

    public function delete($product_id){
        $this->authenticateAdmin();
        DB::table('product')
           ->where("product_id" ,$product_id)
           ->delete();
           return Redirect::to('/allProduct');
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

    public function viewProduct($product_id){

        $viewProduct = DB::table('product')
        ->join("tbl_category" ,"product.category_id" ,"=" ,"tbl_category.category_id")
        ->join("manufacture" ,"product.manufacture_id","=", "manufacture.manufacture_id")
        ->where("product.product_id" , $product_id)
        
        ->first();

        $category =DB::table('tbl_category')
        ->where('category_status' , "on")
        ->get();

        $contact=DB::table('contact')->get();  

        
  $manufacture = DB::table('manufacture')
  ->where("manufacture_status", "on")
  ->get();
    
  
    return view('admin.viewProduct',["manufacture"=>$manufacture, "category"=>$category, "viewProduct" =>$viewProduct,"contact"=>$contact ]);
  
    }
}
