@extends('master')
@section('content')




	<div class="home_trangchu">
	<!-- 	<img src="sublime/images/home_slider_1.jpg" style="width: 100%;height: 100%;"> -->
	<div class="owl-carousel owl-theme" style="background-color: #fffff;">
	    <div class="item">
	    	<img src="sublime/images/Slide/banner1.jpg" style="width: 100%;height: 100%;">	
	    </div>
	    <div class="item">
	    	<img src="sublime/images/Slide/banner2.jpg" style="width: 100%;height: 100%;">	
	    </div>
	    <!-- <div class="item">
	    	<img src="sublime/images/Slide/banner7.jpg" style="width: 100%;height: 100%;">	
	    </div>
	    <div class="item">
	    	<img src="sublime/images/Slide/banner8.jpg" style="width: 100%;height: 100%;">	
	    </div>
	    <div class="item">
	    	<img src="sublime/images/Slide/banner9.jpg" style="width: 100%;height: 100%;">	
	    </div>
	    <div class="item">
	    	<img src="sublime/images/Slide/banner10.jpg" style="width: 100%;height: 100%;">	
	    </div> -->
	   
	</div>
		
	</div>

	




	<!-- Ads -->

	

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 align="center">Sản phẩm mới</h2>
					<div class="product_grid">
						
						<!-- Product -->
						@foreach($new_pro as $new)
							<div class="product"><a href="{{route('chitietsanpham',$new->id)}}">
								<div class="product_image"><img src="sublime/images/dt/{{$new->anh}}" alt=""></div>
								@if($new->new ==1)<div class="product_extra product_new"><a href="categories.html">New</a></div>@endif
								<div class="product_content" align="center">
									<div class="product_title" align="center
									"><a href="{{route('chitietsanpham',$new->id)}}">{{$new->pro_name}}</a></div>
									<div class="product_price"> <?php echo number_format($new->pro_gia)."đ" ?></div>
								</div>
								<form action="{{URL::to('/save-cart')}}" method="post">
									{{csrf_field()}}
									<input type="hidden" name="qty" value="1">
									<input type="hidden" name="productid_hidden" value="{{$new->id}}">
									<button type="submit" class="btn btn-secondary" style="margin-left: 100px">Thêm</button>
								</form>
							</div>
						@endforeach
					</div>
						
				</div>
			</div>
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 align="center">Sản phẩm bán chạy</h2>
					<div class="product_grid">
						
						<!-- Product -->
						@foreach($spbanchay as $new)
							<div class="product"><a href="{{route('chitietsanpham',$new->id)}}">
								<div class="product_image"><img src="sublime/images/dt/{{$new->anh}}" alt=""></div>
								@if($new->new ==1)<div class="product_extra product_new"><a href="categories.html">New</a></div>@endif
								<div class="product_content" align="center">
									<div class="product_title"><a href="{{route('chitietsanpham',$new->id)}}">{{$new->pro_name}}</a></div>
									
								</div><form action="{{URL::to('/save-cart')}}" method="post">
									{{csrf_field()}}
									<input type="hidden" name="qty" value="1">
									<input type="hidden" name="productid_hidden" value="{{$new->id}}">
									<button class="btn btn-secondary" type="submit" style="margin-left: 100px">Thêm</button>
									
								</form>
							</div>
						@endforeach
					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Ad -->

	{{-- <div class="avds_xl">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="avds_xl_container clearfix">
						<div class="avds_xl_background" style="background-image:url(sublime/images/avds_xl.jpg)"></div>
						<div class="avds_xl_content">
							<div class="avds_title">Amazing Devices</div>
							<div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.</div>
							<div class="avds_link avds_xl_link"><a href="categories.html">See More</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="sublime/images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Miễn phí vận chuyển</div>
						<div class="icon_box_text">
							<p>Miễn phí vận chuyển khu vực nội thành TPHCM</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="sublime/images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Miễn phí đổi trả hàng</div>
						<div class="icon_box_text">
							<p>Nếu có bất kì lỗi nào sẽ được đổi mới</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="sublime/images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">Hỗ trợ 24/24</div>
						<div class="icon_box_text">
							<p>Nhân viên tư vấn sẽ hổ trợ 24h</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	
@endsection