<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function login(){

        return view ('admin.admin_login');
    }

    public function dashboard(){

        $this->authenticateAdmin();
        $product =DB::table('product')->get()->count();
        $customers =DB::table('customers')->get()->count();
        $order =DB::table('order')->get()->count();
        $manufacture =DB::table('manufacture')->get()->count();
        $category =DB::table('tbl_category')->get()->count();
        $shipping =DB::table('shippings')->get()->count();
        return view('admin.dashboard',["product"=>$product,"order"=>$order,"customers"=>$customers,"manufacture"=>$manufacture,"category"=>$category,"shipping"=>$shipping]);
    }


    public function authenticate(Request $request){

          $admin_email =$request->admin_email;
          $admin_password= $request->admin_password;

          $result =DB::table('tbl_admin')
               ->where("admin_email", $admin_email)
               ->where("admin_password", $admin_password)
               ->first();

               //print_r($result);

          if($result){
             Session::put("username", $result->admin_email);
             Session::put("admin_id" ,$result->admin_id);

              return Redirect::to('/dashboard');

          }
          
          else{
              Session::put("message" ,"incorrect username or password");
              return Redirect::to('/admin');
          }
    }

    public function logoutAdmin(){

        Session::flush();
        

        return Redirect::to('/admin');
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
