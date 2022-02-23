<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use DB;
use App\Http\Requestss;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
          $qty=$request->qty;
          $product_id=$request->product_id;

         $product= DB::table('product')
            ->where("product_id" ,$product_id)
            ->first();

         $data['qty'] =$qty;
         $data['id'] =$product->product_id;  
         $data['name'] =$product->product_name; 
         $data['price'] =$product->product_price;  
         $data['options']['image'] =$product->product_image; 

         Cart::add($data);

         return Redirect::to("/cart");
    }

    public function Cart(){

        $category =DB::table("tbl_category")
                 ->where("category_status","on")
                 ->get();

                 $contact=DB::table('contact')->get();  

                 $manufacture = DB::table('manufacture')
                 ->where("manufacture_status", "on")
                 ->get();  
                 
                 $content=Cart::content();

          return view('admin.cart' ,["manufacture"=>$manufacture, "category"=>$category ,"content"=>$content,"contact"=>$contact]);       
    }


    public function deleteCart($rowID){

        

        Cart::update($rowID,0);
        return Redirect::to("/cart");
    }

    public function updateQuantity(Request $request)
    {
        $qty =$request->quantity;
        $rowId=$request->rowId;

        Cart::update($rowId,$qty);
        return Redirect::to("/cart");

    }
}
