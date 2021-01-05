@extends('admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <?php
        $message = Session::get('message');
        if($message){
            echo'<span class = "text-alert ">'.$message.'</span>';
            Session::put('message',null);
        }
      ?>
        <div class="table-data__tool">
            
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <a href="{{URL::to('/them-san-pham')}}">
                    <i class="zmdi zmdi-plus"></i>Thêm</button>
                    </a>
                
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        
                        <th></th>
                        <th>Hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Giá KM</th>
                        <th>Kho </th>
                        <th>Đã bán</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dssp as $sp)
                    <tr class="tr-shadow">
                        
                        <td><a href="{{route('editsanpham',$sp->id)}}">Sửa</a></td>
                        <td>
                           <span class="block-email">{{$sp->ten_hang}}</span>
                        </td>
                        <td>{{$sp->pro_name}}</td>
                        <td>{{$sp->pro_mota}}</td>
                        <td>
                            <span class="status--process">{{$sp->pro_gia}}</span>
                        </td>
                        <td>
                            <span class="status--denied">{{$sp->pro_coupo}}</span>
                        </td>
                        
                        <td>{{$sp->soluongnhap}}</td>
                        <td>{{$sp->damua}}</td>
                    </tr>
                    <tr class="spacer"></tr>
                    @endforeach
                </tbody>
            </table>
            {{$dssp->links()}}
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection