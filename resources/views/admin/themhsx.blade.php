@extends('admin')
@section('content')

<div class="card">
    <div class="card-header" style="text-align: center; font-size : 20px">
        <strong>THÊM LOẠI HÀNG</strong>
    </div>
    <div class="card-body card-block" style="padding-left: 200px">
        <form action="{{URL::to('/save-hang-san-xuat')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{csrf_field()}}
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tên loại hàng</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="ten_hang" style="width: 300px" placeholder="Nhập tên loại hàng" class="form-control">
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
            <i class="fa fa-dot-circle-o"></i> Thêm 
        </button>
    </div>
     </form>
</div>
@endsection