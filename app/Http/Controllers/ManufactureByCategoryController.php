<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use DB;
use App\Http\Requestss;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ManufactureByCategoryController extends Controller
{
    public function manufactureByCategory($manufacture_id){
    
         
        $manufactureCat = DB::table('product')
        ->join("tbl_category" ,"product.category_id" ,"=" ,"tbl_category.category_id")
        ->join("manufacture" ,"product.manufacture_id","=", "manufacture.manufacture_id")
        ->select("product.*","tbl_category.category_name","manufacture.manufacture_name")
        ->where("manufacture.manufacture_id" , $manufacture_id)
        ->where("product.product_status" ,"on")
        ->limit(18)
        ->get();

        $category =DB::table('tbl_category')
        ->where('category_status' , "on")
        ->get();

        
  $manufacture = DB::table('manufacture')
  ->where("manufacture_status", "on")
  ->get();
    
  if($manufactureCat)
  {
    return view('admin.manufacture_by_category',["manufacture"=>$manufacture, "category"=>$category, "manufacture" =>$manufactureCat ]);
  }

  else{
      return Redirect::to("/");
  }

        
    }
}

