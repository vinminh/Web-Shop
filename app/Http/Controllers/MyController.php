<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\hang;
use App\customer;
use DB;
use Session;
use App\Http\Requests;
use Cart;
use Mail;
use App\hoadon;
use App\chitiethoadon;
use App\Resetpass;
use Illuminate\Support\Facades\Redirect;



//session_start();
class MyController extends Controller
{
    public function getIndex(){
        
        $new_pro=product::where('new',1)->limit(4)->get();
       $hang=hang::get();
       $spbanchay=DB::table('product')->orderBy('damua','desc')->limit(4)->get();
    	return view('page.trangchu',compact('new_pro','hang','spbanchay'));
    }
    public function getSanpham(Request $req){
         $sanpham=product::where('id',$req->id)->first();
         $hang=hang::get();
         $sptt=product::where('pro_hang',$sanpham->pro_hang)->paginate(4);

        return view('page.sanpham',compact('hang','sanpham','sptt'));
    }
    public function lienhe(){
         $hang=hang::get();
    	return view('page.lienhe',compact('hang'));
    }
    public function lichsu(){
        $hang=hang::get();
        $id=customer::where('user_email',Session::get('user'))->first();

        $hd=hoadon::where('hd_user',$id->id)->get();
        $chitiet=chitiethoadon::get();
        return view('page.lichsu',compact('hang','hd','chitiet'));
    }
    public function huy(Request $req){
        hoadon::where('id',$req->idhidden)->update(['hd_status'=>4]);
        return redirect::to('lich-su');

    }
    public function thanhtoan(Request $req){

        $hang=hang::get();
        $tong=0;
        $ship=$req->radio;
        Session::put('ship',$ship);
        $thongtin=DB::table('customer')->where('user_email',Session::get('user'))->first();

    	return view('page.thanhtoan',compact('hang','tong','ship','thongtin'));

    } 
    public function payment(){
        $thongtin=DB::table('customer')->where('user_email',Session::get('user'))->first();
        $data=array();
        $data['hd_user']=$thongtin->id;
        $data['hd_status']='0';
        $data['ship']=Session::get('ship');
        $hd_id=DB::table('hoadon')->insertGetId($data);

        $content= Cart::content();
        foreach ($content as $v) {
            $dt=array();
            $dt['id_hd']=$hd_id;
            $dt['id_sp']=$v->id;
            $dt['soluong']=$v->qty;
            DB::table('chitiethoadon')->insert($dt);
            $sp=DB::table('product')->where('id',$dt['id_sp'])->first();
            $d=DB::table('product')->where('id',$v->id);
            $up=$sp->damua+$v->qty;

            DB::table('product')->where('id',$v->id)->update(['damua'=>$up]);
           
        }
        Cart::destroy();
        Session::forget('ship');

        $userMail =  $thongtin->user_email;
        // Mail::send('page.mailPay', [], function($message) use( $userMail) {
        //     $message->from('hieu.dh51600821@gmail.com', 'Web bán điện thoại');
        //     $message->to($userMail, 'Khách hàng')->subject('Mua hàng thành công');
        // });
        return redirect::to('/index');
            
    }
    public function tintuc(){
        $hang=hang::get();
        return view('page.tintuc',compact('hang'));
    }
    public function all(){
        $hang=hang::get();
        $getsp=product::paginate(8);
        return view('page.show',compact('hang','getsp'));
    }
    public function danhmuc($req){
         $hang=hang::get();
         $tenhang=hang::where('id',$req)->first();
         $getsp=product::where('pro_hang',$req)->paginate(12);
    	return view('page.danhmuc',compact('hang','getsp','tenhang'));
    }
    // Giỏ hàng
    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('product')->where('id',$productId)->first(); 
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $data['id'] = $product_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->pro_name;
        $data['price'] = $product_info->pro_coupo;
        $data['weight'] = $product_info->pro_gia;
        $data['options']['image'] = $product_info->anh;
        Cart::add($data);

        // Cart::destroy();
        return Redirect::to('/show-cart');
       
    }
    public function show_cart(){
        $hang=hang::get();
        $tong=0;
        $tongqty=0;
       
        return view('page.giohang',compact('hang','tong','tongqty'));
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }



    
    public function kiemtra(Request $req){
        $hang=hang::get();
        $d=customer::where('user_email',$req->email)->first();
        if($d==null){
            echo "Email k tồn tại";
            return redirect('login');
        }
        else{
            if($d->password==$req->pass){
                        $req->session()->put('user', $req->email);
                        $req->session()->put('username',$d->ten);
                        return Redirect::to('index');
                   }
        }
        return view('page.login',compact('hang'));

    }
     public function postresetpass(Request $req){
       $email = $req->email;
       $customer = customer::where("user_email", $email)->first();

       if($customer){
            $token = \Str::random(32);
            Resetpass::Create(['email' => $email, 'token' => $token]);
            $link = route("resetLink",['token' => $token]);
           
            Mail::send('page.mailReset', ['link' => $link], function($message) use($email) {
                $message->from('hieu.dh51600821@gmail.com', 'Web bán điện thoại');
                $message->to($email, 'Khách hàng')->subject('Reset Password');
            });
            Session::flash('success', 'Kiểm tra email');
            return redirect()->back();
       }else{
            die("Không tồn tại trong hệ thông");
       }


    }
    public function postnewpass(Request $req){
       $pass = $req->pass;
       $token = $req->token;
       $result = Resetpass::where('token', $token)->first();

       customer::where('user_email', $result->email)->update(['password' => $pass]);
       Session::flash('success', 'Đã thay đổi password');
       return redirect()->route('login');

    }
    public function linkResetToken($token){
         $hang=hang::get();
       $result = Resetpass::where('token', $token)->first();
        return view('page.newPass',compact('result','hang'));
    }
    public function dangxuat(){
        Session::forget('user');
        return redirect::to('/index');
    }
    public function timkiem(Request $request){
        $keyword=$request->keyword_submit;
       $hang=hang::get();    
        $sanpham_timkiem= DB::table('product')->where('pro_name','like','%'.$keyword.'%')->get();
        // return view('page.timkiem')->with('sanpham_timkiem',$sanpham_timkiem);
        return view('page.timkiem',compact('hang','sanpham_timkiem','keyword'));
    }
   
    //End giỏ hàng
    public function login(){
        $hang=hang::get();
        return view('page.login',compact('hang'));
    }
    public function register(){
         $hang=hang::get();
        return view('page.register',compact('hang'));
    }
    public function resetpw(){
         $hang=hang::get();
        return view('page.resetpw',compact('hang'));
    }
    public function postreg(Request $req){
        $this->validate($req,
            ['user_email'=>'required|email|unique:customer,user_email',
            'password'=>'required|min:6|max:20',
            'ten'=>'required',
            'diachi'=>'required',
            'user_phone'=>'required'

            ],
            ['user_email.required'=>'Vui lòng nhập email',
            'user_email.email'=>'K đùng định dạng',
            'user_email.unique'=>'Email có người sử dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'ten.required'=>'Vui lòng nhập tên',
            'diachi.required'=>'Vui lòng nhập địa chỉ',
            'user_phone.required'=>'Vui lòng nhâp số điện thoại'
            ]
        );
        $user=new customer();
        $user->user_email=$req->user_email;
        $user->password=$req->password;
        $user->ten=$req->ten;
        $user->diachi=$req->diachi;
        $user->user_phone=$req->user_phone;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo thành công');
    }
}
