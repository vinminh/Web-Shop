@extends('master');
@section('content')

<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url({{ URL :: asset('sublime/images/categories.jpg')}}"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Tất cả điện thoại<span>.</span></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="sorting_container ml-md-auto">
							<div class="sorting">
								<ul class="item_sorting">
									<li>
										<span class="sorting_text">Sắp xếp</span>
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<ul>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Mặc định</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Giá</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Tên</span></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

						<!-- Product -->
						@foreach($getsp as $sp)<a href="{{route('chitietsanpham',$sp->id)}}">
							<div class="product">
								<div class="product_image"><img src="sublime/images/dt/{{$sp->anh}}" alt=""></div>
								@if($sp->new ==1)<div class="product_extra product_new"><a href="categories.html">New</a></div>@endif
								<div class="product_content">
									<div class="product_title"><a href="{{route('chitietsanpham',$sp->id)}}">{{$sp->pro_name}}</a></div>
									<div class="product_price"><?php echo number_format($sp->pro_gia)."đ"?>	</div>
								</div>
							</div>
						@endforeach


					</div>
					<div class="product_pagination">
						{{$getsp->links()}}
					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="{{ URL :: asset('sublime/images/icon_1.svg')}}" alt=""></div>
						<div class="icon_box_title">Miễn phí vận chuyển</div>
						<div class="icon_box_text">
							<p>Miễn phí vận chuyển khu vực nội thành TPHCM</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="{{ URL :: asset('sublime/images/icon_2.svg')}}" alt=""></div>
						<div class="icon_box_title">Miễn phí đổi trả hàng</div>
						<div class="icon_box_text">
							<p>Nếu có bất kì lỗi nào sẽ được đổi mới</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="{{ URL :: asset('sublime/images/icon_3.svg')}}" alt=""></div>
						<div class="icon_box_title">Hỗ trợ 24/24</div>
						<div class="icon_box_text">
							<p>Nhân viên tư vấn sẽ hổ trợ 24h</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->

	

@endsection