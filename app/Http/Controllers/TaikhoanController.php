<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\hang;
use App\customer;
use Illuminate\Support\Facades\Redirect;

class TaikhoanController extends Controller
{
   	public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function danhsachuser(){
    	$this->AuthLogin();
    	$dsuser = DB::table('customer')->paginate(8);
    	$qlydsuser = view('admin.danhsachuser')->with('dsuser',$dsuser);
    	return view('admin')->with('admin.danhsachuser',$qlydsuser);
    }
    public function dangkyuser(Request $request){
        $data = array();
        $data['ten'] = $request->ten;
        $data['user_name'] = $request->user_name;
        $data['password'] = $request->password;
        $data['user_email'] = $request->user_email;
        $data['user_phone'] = $request->user_phone;
        $data['diachi'] =$request->diachi;

        DB::table('customer')->insert($data);
        Session::put('message','thành công');
        return Redirect::to('/index');

    }
}
