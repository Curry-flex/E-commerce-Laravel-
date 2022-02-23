<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use DB;
use Cart;
use App\Http\Requestss;
use Session;

use Illuminate\Support\Facades\Redirect;

class checkoutController extends Controller
{
    public function loginCheck()
    {

        $session=Session::get("customer_id");
        $contact=DB::table('contact')->get();  

        if($session)
        {
            return Redirect::to('/checkout');
        }

        else{
        $category =DB::table("tbl_category")
        ->where("category_status","on")
        ->get();



        $manufacture = DB::table('manufacture')
        ->where("manufacture_status", "on")
        ->get();  
        
        $content=Cart::content();

 return view('admin.login' ,["manufacture"=>$manufacture, "category"=>$category,"contact"=>$contact]);
        }
     
    }

    public function register(Request $request){

        $data = array();

        $data["customer_name"] =$request->name;
        $data["customer_email"] =$request->email;
        $data["customer_password"] =md5($request->password);
        $data["customer_mobile"] =$request->mobile;

       $customer_id= DB::table('customers')->insertGetId($data);

       Session::put("customer_id" ,$customer_id);
       Session::put("customer_name" ,$request->name);

       return Redirect::to('/checkout');
    }

    public function checkout(){

        
        $category =DB::table("tbl_category")
        ->where("category_status","on")
        ->get();

        $manufacture = DB::table('manufacture')
        ->where("manufacture_status", "on")
        ->get(); 
        
        $contact=DB::table('contact')->get();  
        
        $content=Cart::content();

 return view('admin.checkout' ,["manufacture"=>$manufacture, "category"=>$category,"contact"=>$contact]);

      
    }

    public function addShipping(Request $request){

        
        $data = array();

        $data["shipping_first_name"] =$request->fname;
        $data["shipping_last_name"] =$request->lname;
        $data["shipping_email"] =$request->email;
        $data["shipping_address"] =$request->address;
        $data["shipping_mobile"] =$request->mobile;
        $data["shipping_country"] =$request->country;
        $data["shipping_city"] =$request->city;

       $shpping_id= DB::table('shippings')->insertGetId($data);

       Session::put("shipping_id" ,$shpping_id);
 

       return Redirect::to('/payment');


    }

    public function login(Request $request){

        $email =$request->email;
        $password=md5($request->password);

        $result =DB::table('customers')
                  ->where("customer_email",$email)
                  ->where("customer_password" ,$password)
                  ->first();

             if($result){

               Session::put("customer_id" ,$result->customer_id);

               

               //$session=Session::get("customer_id");
                return Redirect::to('/checkout');
             } 
             else{

                return Redirect::to('/login-check');
             }    
    }


    public function logout()
    {
        Session::flush();

        return Redirect::to('/');
    }

    public function payment()
    {

        $category =DB::table("tbl_category")
        ->where("category_status","on")
        ->get();

        $manufacture = DB::table('manufacture')
        ->where("manufacture_status", "on")
        ->get();  
        
        $content=Cart::content();
        $contact=DB::table('contact')->get();  

        return view('admin.payment' ,["manufacture"=>$manufacture, "category"=>$category,"content"=>$content,"contact"=>$contact]);
    }

    public function order(Request $request)


     {

        $total =Cart::total();
       // echo $tota;
        $content =Cart::content();
        $payment_method =$request->payment;
       $paymentData = array();

       $paymentData['payment_method'] = $payment_method;
       $paymentData['payment_status'] = "pending";

       $payment_id =DB::table('payment')->insertGetId($paymentData);

       $oda =array();

       $oda['customer_id']= Session::get('customer_id');
       $oda['shipping_id']= Session::get('shipping_id');
       $oda['payment_id']= $payment_id;
       $oda['order_total']=$total;
       $oda['order_status']="pending";

      $oda_id= DB::table('order')->insertGetId($oda);

      

      $odaDetails=array();

      foreach($content as $content)
      {
          $odaDetails['order_id']=$oda_id;
          $odaDetails['product_id'] =$content->id;
          $odaDetails['product_name'] =$content->name;
          $odaDetails['product_price'] =$content->price;
          $odaDetails['product_quantity'] =$content->qty;

          DB::table('order_details')->insert($odaDetails);
      }
      if($payment_method){

        Cart::destroy();
        return Redirect::to('/feedback');
         
    }


     }

    
     public function feedback()
     {

        $category =DB::table("tbl_category")
        ->where("category_status","on")
        ->get();

        $manufacture = DB::table('manufacture')
        ->where("manufacture_status", "on")
        ->get();  
        
        $content=Cart::content();
        $contact=DB::table('contact')->get();  

        return view('admin.feedback' ,["manufacture"=>$manufacture, "category"=>$category,"contact"=>$contact]);
    
     }

     public function manageOrder()
     {
        $orderData = DB::table('order')
        ->join("customers" ,"order.customer_id" ,"=" ,"customers.customer_id")
    
        ->get();

      return view('admin.manage-order')->with('oda' , $orderData);
     }


     public function delete($order_id){
    
        DB::table('order')
            ->where("order_id",$order_id)
            ->delete();

                 return Redirect::to('/manage-order');
    }

    public function viewOrder($order_id)
    {
        $orderData = DB::table('order')
        ->join("customers" ,"order.customer_id" ,"=" ,"customers.customer_id")
        ->join("order_details","order.order_id","=" ,"order_details.order_id")
        ->join("shippings","order.shipping_id","=","shippings.shpping_id")
        ->where("order.order_id",$order_id)
        
        ->get();

      return view('admin.viewOrder')->with('odaaa' , $orderData);
    }
}
