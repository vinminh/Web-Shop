<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\hang;
use Illuminate\Support\Facades\Redirect;

class HangsxController extends Controller
{
    // public function AuthLogin(){
    //     $admin_id = Session::get('id');
    //     if($admin_id){
    //         return Redirect::to('dashboard');
    //     }else{
    //         return Redirect::to('admin')->send();
    //     }
    // }
    public function themhsx(){
        //$this->AuthLogin();
    	return view('admin.themhsx');
        }
    public function save_hsx(Request $request){
    	$data = array();
    	$data['ten_hang'] = $request->ten_hang;

    	// echo '<pre>';
    	// print_r($data);
    	// echo '</pre>';
    	// die();
    	DB::table('hang')->insert($data);
    	Session::put('message','Thêm danh mục thành công');
    	return Redirect::to('danh-sach-hang-san-xuat');
    }
    public function dshsx(){
        
        $dshsx = DB::table('hang')->get();

    	return view('admin.danhsachnsx')->with('dshsx',$dshsx);
    }

    public function delete_hangsx($id_hang){
        //$this->AuthLogin();
        $hng = DB::table('product')->where("pro_hang",$id_hang)->first();
        if(!is_null($hng)){
            Session::put('message','Xóa khong thành công');
        }
        else{
            DB::table('hang')->where('id',$id_hang)->delete();
            Session::put('message','Xóa danh mục thành công');
        }
        return Redirect::to('danh-sach-hang-san-xuat');
    }

    public function edit_hangsx($id_hang){
        //$this->AuthLogin();
        $id_hang = DB::table('hang')->where('id',$id_hang)->get();
        $quanlyhangsx = view('admin.edithsx')->with('id_hang',$id_hang);
        return view('admin')->with('admin.edithsx',$quanlyhangsx);
    }
    public function update_hangsx(Request $request,$id_hang){
        //$this->AuthLogin();
        $data = array();
        $data['ten_hang'] = $request->ten_hang;
        // $data['loaisanpham_status'] =$request->loaisanpham_status;

        DB::table('hang')->where('id',$id_hang)->update($data);
        Session::put('message','Cập nhật loại hàng thành công');
        return Redirect::to('danh-sach-hang-san-xuat');
    }
}
