    @extends('admin')
@section('content')
<div class="card">
    <div class="card-header" style="text-align: center; font-size : 20px">
        <strong>CHI TIẾT HÓA ĐƠN</strong>
    </div>
    <div class="card-body card-block" style="padding-left: 200px">
        <form action="{{URL::to('/danh-sach-don-hang')}}" method="get" enctype="multipart/form-data" class="form-horizontal">
                       {{csrf_field()}} 
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Mã hóa đơn</label>
                </div>
                 <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">{{$hd->id}}</label>
                </div>
                
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tên người mua</label>
                </div>
                 <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">{{$thongtin->ten}}</label>
                </div>
                
            </div>
             <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Địa chỉ</label>
                </div>
                 <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">{{$thongtin->diachi}}</label>
                </div>
                
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Danh sách sản phẩm</label><br />	
                    @foreach($chitiethd as $chitiet)
                    <label for="">
                    	@foreach($sanpham as $s)
							@if($chitiet->id_sp == $s->id)
								{{$s->pro_name}}
								@endif


                    	@endforeach
                    </label><br>
                    
                    @endforeach

                </div>
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Số lượng</label><br />
                    @foreach($chitiethd as $chitiet)
                    <label for="">{{$chitiet->soluong}}</label><br>
                     
                      @endforeach
                </div>
               
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tổng tiền</label>
                </div>
                 <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">{{$tong}} VNĐ</label>
                </div>
                
            </div>
            

            
            <!-- <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Trạng thái</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="select" id="select" class="form-control" style="width: 300px">
                        <option value="0">Hiển thị</option>
                        <option value="1">Ẩn</option>
                    </select>
                </div>
            </div> -->
            
       
    </div>
    <div class="card-footer" style="text-align: center">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Trở về 
        </button>
    </div>
     </form>

     <form action="{{URL::to('/trang-thai')}}" method="post">
        {{csrf_field()}} 
            <div class="row form-group">
                <input type="hidden" name="ttid" value="{{$hd->id}}">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Trạng thái</label>
                </div>
                 <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        <select name="tt" >
                           <option @if($hd->hd_status == 0 )
                            selected
                            @endif value="0">Chưa xác nhận</option>
                           <option @if($hd->hd_status == 1 )
                            selected
                            @endif value="1">Đã xác nhận</option>
                           <option @if($hd->hd_status == 2 )
                            selected
                            @endif value="2">Đang giao</option>
                           <option @if($hd->hd_status == 3 )
                            selected
                            @endif value="3">Đã giao</option>
                           <option @if($hd->hd_status == 4 )
                            selected
                            @endif value="4">Đã hủy</option>                       
                        </select>
                        <button type="submit" class="btn btn-secondary">Cập Nhật</button>
                        
                    </label>
                    
                </div></form>
                
            </div>
</div>
@endsection