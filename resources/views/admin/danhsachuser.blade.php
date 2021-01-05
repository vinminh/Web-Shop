@extends('admin')
@section('content')
<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>Danh sách tài khoãn</h3>
   
    <div class="table-responsive table-data" style="height: 100%">
        <table class="table">
            <thead>
                <tr>
                    <td>Email</td>
                    <td>Tên</td>
                    <td>Số điện thoại</td>
                    <td>Địa chỉ</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($dsuser as $user)
                <tr>
                    <td>
                    {{$user->user_email}}
                            
                    </td><td>
                    {{$user->ten}}
                            
                    </td>
                    <td>{{$user->user_phone}}</td>
                    <td>{{$user->diachi}}</td>
                    <td>
                        <span class="role member">Member</span>
                    </td>
                    
                    <td>
                        <span class="more">
                            <i class="zmdi zmdi-more"></i>
                        </span>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    
</div>
@endsection