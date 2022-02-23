<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use DB;
use Cart;
use App\Http\Requestss;
use Session;
use Illuminate\Support\Facades\Redirect;



class ContactController extends Controller
{
    public function contact()
    {
        return view('admin.contact');
    }

    public function addContact(Request $request)
    {
        $data = array();
        $data['phone'] =$request->phone;
        $data['email'] =$request->email;

      
        DB::table("contact")->insert($data);
        
        return Redirect::to("/addContact");
    }

    public function allContact()
    {
        $contact=DB::table('contact')->get();

        return view('admin.allContact')->with("contact", $contact);
    }

    public function viewContact($contact_id){

       
        $data=DB::table('contact')
              ->where("contact_id",$contact_id)
              ->first();


              return view('admin.editcontact')->with("editData" , $data);
    }

    public function updateContact(Request $request,$contact_id){

        $data = array();
        $data['phone'] =$request->phone;
        $data['email'] =$request->email;

        DB::table('contact')
              ->where("contact_id",$contact_id)
              ->update($data);


              return Redirect::to("/allContact");
    }

    public function deleteContact($contact_id)
    {
        DB::table('contact')
           ->where("contact_id",$contact_id)
           ->delete();
           return Redirect::to("/allContact");

    }
}
