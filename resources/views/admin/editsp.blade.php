@extends('admin')
@section('content')
    <div class="card">
        <div class="card-header" style="text-align:center">
            <strong>SỬA SẢN PHẨM</strong> 
        </div>
        <div class="card-body card-block" style="padding-left: 150px;">
            <form action="{{URL::to('/sua-san-pham')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tên sản phẩm</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="tensanpham" name="pro_name" value="{{$sp->pro_name}}" class="form-control">
                        <input type="hidden" name="idhidden" value="{{$sp->id}}">
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">Mô tả</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="pro_mota" id="mota" rows="9" value="{{$sp->pro_mota}}" class="form-control"></textarea>                   
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Giá sản phẩm</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="gia" name="pro_gia" value="{{$sp->pro_gia}}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Giá khuyến mãi</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="giakhuyenmai" name="pro_coupo" value="{{$sp->pro_coupo}}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Số lượng nhập</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nhap" name="nhap" value="{{$sp->soluongnhap}}" class="form-control">
                    </div>
                </div>
                
        <!-- <div class="row form-group">
            @for($i=1 ; $i<=10 ; $i++)
            <div class="col col-md-3">
                <label for="file-input" class=" form-control-label">File input {!! $i !!}</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="file" id="file-input" name="hinhanh" class="form-control-file">
            </div>
            @endfor                   
        </div> -->
            
        </div>
        <div class="card-footer"style="text-align: center">
            <button type="submit" class="btn btn-primary btn-sm" >
                <i class="fa fa-dot-circle-o"></i> Cập nhật
            </button>
        </div>
        </form>
    </div>
@endsection
