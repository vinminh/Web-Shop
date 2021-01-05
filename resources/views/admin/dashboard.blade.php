@extends('admin')
@section('content')
 <div class="container-fluid">
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div><a href="{{URL::to('/danh-sach-user')}}">
                        <div class="text">
                            <h2>{{count($d)}}</h2>
                            <span>User Account</span>
                        </div></a>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div><a href="{{URL::to('/danh-sach-don-hang')}}">
                        <div class="text">
                            <h2>{{count($hd)}}</h2>
                            <span>Đơn hàng</span>
                        </div></a>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div><a href="{{URL::to('/danh-sach-don-hang')}}">
                        <div class="text">
                            <h2>{{count($moi)}}</h2>
                            <span>Đơn hàng mới</span>
                        </div></a>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div><a href="{{URL::to('/danh-sach-don-hang')}}">
                        <div class="text">
                            <h2>{{$tong}}</h2>
                            <span>VNĐ</span>
                        </div></a>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
   
    
</div>
@endsection