@extends('admin')
@section('content')
    <div class="card">
        <div class="card-header" style="text-align:center">
            <strong>THÊM SẢN PHẨM</strong> 
        </div>
        <div class="card-body card-block" style="padding-left: 150px;">
            <form action="{{URL::to('/save-san-pham')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tên sản phẩm</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="tensanpham" name="pro_name" placeholder="Nhập tên sản phẩm" class="form-control"  onmouseout="kiemtra()"   >
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">Mô tả</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="pro_mota" id="mota" rows="9" placeholder="Nhập mô tả cho sản phẩm" class="form-control"></textarea>                   
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Giá sản phẩm</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="gia" name="pro_gia" placeholder="Nhập giá sản phẩm" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Giá khuyến mãi</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="giakhuyenmai" name="pro_coupo" placeholder="Nhập giá khuyến mãi" class="form-control">
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">File hình</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="hinh" name="file-input" class="form-control-file">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Loại hàng</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="pro_hang" id="select" class="form-control">
                           <option value="0">--Chọn loại hàng--</option>
                           @foreach($dshsx as $hsx)
                            <option value="{{$hsx->id}}">{{$hsx->ten_hang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Số lượng nhập</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nhap" name="nhap" placeholder="" class="form-control">
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
            <button type="submit" class="btn btn-primary btn-sm" onclick="kiemtra()">
                <i class="fa fa-dot-circle-o"></i> Thêm
            </button>
            <button type="reset" class="btn btn-danger btn-sm" >
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
        </form>
    </div>
    <script language="javascript">
            function kiemtra(){
                
                         alert('Không được bỏ trống'+ten);
}
    </script>
@endsection
