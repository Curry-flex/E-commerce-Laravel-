<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Requests;
use DB;
use App\Http\Requestss;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function home(){
    
        $slider =DB::table('sliders')
             ->where("slider_status","on")
             ->get();

    $contact=DB::table('contact')->get();     


        $productData = DB::table('product')
        ->join("tbl_category" ,"product.category_id" ,"=" ,"tbl_category.category_id")
        ->join("manufacture" ,"product.manufacture_id","=", "manufacture.manufacture_id")
        ->where("product_status" , "on")
        ->limit(9)
        ->get();

        $recomend=DB::table('product')
                   ->where("product_recomend","on")
                   ->get();

                   $women=DB::table('product')
                   ->join("tbl_category" ,"product.category_id" ,"=" ,"tbl_category.category_id")
                   ->where("tbl_category.category_name","women")
                   ->get();  
                   
                   $men=DB::table('product')
                   ->join("tbl_category" ,"product.category_id" ,"=" ,"tbl_category.category_id")
                   ->where("tbl_category.category_name","men")
                   ->get();

                   $kids=DB::table('product')
                   ->join("tbl_category" ,"product.category_id" ,"=" ,"tbl_category.category_id")
                   ->where("tbl_category.category_name","Kids")
                   ->get();

                   $sport=DB::table('product')
                   ->join("tbl_category" ,"product.category_id" ,"=" ,"tbl_category.category_id")
                   ->where("tbl_category.category_name","Sport")
                   ->get();

                   $elecronics=DB::table('product')
                   ->join("tbl_category" ,"product.category_id" ,"=" ,"tbl_category.category_id")
                   ->where("tbl_category.category_name","Electronics")
                   ->get();

        $status=DB::table('product')
                   ->where("product_status","on")
                   ->get();           

  $manufacture = DB::table('manufacture')
               ->where("manufacture_status", "on")
               ->get();

  $category =DB::table('tbl_category')
         ->where('category_status' , "on")
         ->get();
        return view('page.home',["category" => $category , "manufacture" => $manufacture ,"product" =>$productData ,"slider" => $slider ,"status"=>$status ,"recomend"=>$recomend,
    "womens"=>$women,
    "men"=>$men,
    "kids"=>$kids,
    "electronics"=>$elecronics,
    "sports"=>$sport,
    "contact"=>$contact
    
    ]);
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
