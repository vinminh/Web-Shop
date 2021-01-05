<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use App\customer;
use App\hoadon;
use App\chitiethoadon;
use App\product;

//session_start();

class AdminController extends Controller
{
     public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function getIndex(){
        return view('admin.login');
    }
    //Trả về trang chính admin
    public function showDashboard(){
        $this->AuthLogin();
        $d=customer::get();
        $hd=hoadon::get();
        $sp=product::get();
        $ct=chitiethoadon::get();
        $tong=0;
        foreach($ct as $c)
        {
            foreach($sp as $s)
            {
                if($c->id_sp == $s->id)
                    $tong=$tong+$s->pro_coupo*$c->soluong;

            }
        }
        $moi = hoadon::where('hd_status',0)->get();

    	return view('admin.dashboard',compact('d','hd','moi','tong'));
    }

    public function login(Request $request){
    	$username = $request ->username;
    	$password = $request ->password;

    	
    	$result = DB::table('nhanvien')->where('user_name',$username)
        ->where('password',$password)->where('id_quyen','=','1')->first();
        if($result){
            Session::put('ten',$result->user_name);
            Session::put('id',$result->id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Tài khoản hoặc mật khẩu không đúng');
            return Redirect::to('/admin');
        }

    }
    public function logout(){
        $this->AuthLogin();
    	Session::forget('ten');
        Session::put('id');
        return Redirect::to('/admin');
    }
}
