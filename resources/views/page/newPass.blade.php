@extends('master');
@section('content')
    @php 
 
    @endphp
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="{{URL::to('/postnewpw')}}" method="post">{{csrf_field()}}
                  <div class="form-group">
                     <label>Pass mới</label>
                     <input type="text" name="pass" class="form-control" placeholder="Nhap pass">
                  </div>
                  <input type="hidden" name="token" value="{{ $result->token }}">
                  <button type ="submit" class="btn btn-secondary">Thay đổi</button></a>
               </form>
            </div>
         </div>
      </div>
      

@if(Session::has('fail'))

      <p style="font-size: 30px;color: red ;margin-left: 750px;margin-top: 50px">Dang nhap that bai</p>
  @endif
<style type="text/css">
	body {
    font-family: "Lato", sans-serif;
}


.main {
    margin-top:-150px;

    padding: 0px 10px;
    align-items: center;
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
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}

</style>


@endsection