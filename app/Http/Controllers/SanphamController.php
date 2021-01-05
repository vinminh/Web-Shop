<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\hang;
use App\product;
use Illuminate\Support\Facades\Redirect;

class SanphamController extends Controller
{	public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function dssanpham(){
        
        $dssp = DB::table('hang')->join('product','product.pro_hang','=','hang.id')->paginate(8);

    	return view('admin.danhsachsanpham')->with('dssp',$dssp);
    }
    public function addsanpham(){
    	$dshsx = DB::table('hang')->get();
    	return view('admin.themsanpham')->with('dshsx',$dshsx);
    }
    public function edit($id){
        $dshsx = DB::table('hang')->get();
        $sp=product::where('id',$id)->first();
        return view('admin.editsp',compact('dshsx','sp'));
    }
    //;
    public function suasp(Request $req)
    {
        $d=product::find($req->idhidden);
        $d->pro_name=$req->pro_name;
        $d->pro_mota=$req->pro_mota;
         $d->pro_gia=$req->pro_gia;
          $d->pro_coupo=$req->pro_coupo;
           $d->soluongnhap=$req->nhap;

        $d->save();
        return Redirect('/danh-sach-san-pham');
    }
    public function savesp(Request $req){
        $sanpham= new product();
        $sanpham->pro_name=$req->pro_name;
        $sanpham->pro_mota=$req->pro_mota;
        if($req->hasFile('file-input'))
            {
                $file=$req->file('file-input');
                $sanpham->anh=$file->getClientOriginalName('file-input');
                $file->move('sublime/images/dt',$sanpham->anh);
            }
        $sanpham->pro_hang=$req->pro_hang;
        $sanpham->pro_gia=$req->pro_gia;
        $sanpham->pro_coupo=$req->pro_coupo;
        $sanpham->soluongnhap=$req->nhap;
        $sanpham->damua=0;
        $sanpham->new=1;
        $sanpham->save();

    }
}
