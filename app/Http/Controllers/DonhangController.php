<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoadon;
use App\chitiethoadon;
use DB;
use App\customer;
use App\product;


class DonhangController extends Controller
{
    public function dsdh(){
    	$hd=DB::table('hoadon')->get();
    	$user= DB::table('customer')->get();
    	return view('admin.danhsachdonhang',compact('hd','user'));
    }
    public function chitiet($req){
    	$tong=0;
    	$hd=DB::table('hoadon')->where('id',$req)->first();
    	$thongtin=DB::table('customer')->where('id',$hd->hd_user)->first();

    	$chitiethd=DB::table('chitiethoadon')->where('id_hd',$req)->get();

    	$sanpham = DB::table('product')->get();
    	foreach ($chitiethd as $chitiet)
    		foreach($sanpham as $s)
    			if($chitiet->id_sp == $s->id)
    				$tong=$tong+ ( $chitiet->soluong*$s->pro_coupo);
    		
    	
    	return view('admin.chitiet',compact('hd','chitiethd','thongtin','sanpham','tong'));

    }
    public function trangthai(Request $req){
        $hd=DB::table('hoadon')->get();
		$user= DB::table('customer')->get();
        DB::table('hoadon')->where('id',$req->ttid)->update(['hd_status'=>$req->tt]);
        return view('admin.danhsachdonhang',compact('hd','user'));

    }
}
