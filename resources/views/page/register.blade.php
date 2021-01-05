@extends('master');
@section('content')
<div class="sidenav">     
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="{{URL::to('/save-user')}}" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                @if(count($errors)>0)
                  @foreach($errors->all() as $err)
                    <p style="font-size: 20px;color: red">{{$err}}</p>
                  @endforeach
                @endif
                @if(Session::has('thanhcong'))
                      {{Session::get('thanhcong')}}
                @endif
                
                <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control" placeholder="Email" name="user_email" id="user_name"    >
                  </div>
                  <div class="form-group">
                     <label>Mật khẩu</label>
                     <input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password">
                  </div>
                   <div class="form-group">
                     <label>Họ và tên </label>
                     <input type="text" class="form-control" placeholder="Họ và tên" name="ten" id="ten">
                  </div>
                   <div class="form-group">
                     <label>Địa chỉ</label>
                     <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" id="diachi">
                  </div>
                  <div class="form-group">
                     <label>Số điện thoại</label>
                     <input type="text" class="form-control" placeholder="Số điện thoại" name="user_phone" id="user_phone">
                  </div>
                 
                  
                  <button type="submit" class="btn btn-secondary">Đăng kí</button>
               </form>
            </div>
         </div>
      </div>
      


<style type="text/css">
  body {
    font-family: "Lato", sans-serif;
}



.main-head{
    margin-top: -200px;
    
   
}

.sidenav {
    height: 100%;
    
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
  margin-top: -200px;
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #000;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #000;
}

</style>
@endsection