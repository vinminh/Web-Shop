@extends('master');
@section('content')
<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(sublime/images/categories.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title"><span></span></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product Details -->

	<div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
						<div class="details_image_large"><img src="sublime/images/dt/{{$sanpham->anh}}" alt="">
							@if($sanpham->new ==1)
							<div class="product_extra product_new">
						
							<a href="categories.html">New</a></div>@endif</div>
						
						
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<div class="details_name">{{$sanpham->pro_name}}</div>
						<div class="details_discount"><?php echo number_format($sanpham->pro_gia)."đ"?></div>
						<div class="details_price"><?php echo number_format($sanpham->pro_coupo)."đ"?></div>

						<!-- In Stock -->
						<div class="in_stock_container">
							<div class="availability">Tình trạng:</div>
							@if($sanpham->soluongnhap - $sanpham->damua >0)
							<span>Còn hàng</span>
							@else
							<span style="color: red">Hết hàng</span>
							@endif
							
						</div>
						
						<!-- Product Quantity -->
						<form action="{{URL::to('/save-cart')}}" method="post">
							{{csrf_field()}}
						<div class="product_quantity_container">
							<div class="product_quantity clearfix">
								<span>SL</span>
								<input name="qty" type="number" pattern="[1-9]*" min="1" max="10" value="1">
								<input type="hidden" name="productid_hidden" value="{{$sanpham->id}}">
							</div>
							<button class="btn btn-secondary" type="submit">Thêm vào giỏ hàng</button> 
						</div>
					</form>
						<!-- Share -->
						<div class="details_share">
							<span>Chia sẻ:</span>
							<ul>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row description_row">
				<div class="col">
					<div class="description_title_container">
						<div class="description_title">Mô tả</div>
						<div class="reviews_title"><a href="#">Bình luận <span>(1)</span></a></div>
					</div>
					<div class="description_text">
						<p>{{$sanpham->pro_mota}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Sản phẩm tương tự</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

						<!-- Product -->
						@foreach($sptt as $tt)
						<div class="product"><a href="{{route('chitietsanpham',$tt->id)}}">
							<div class="product_image"><img src="sublime/images/dt/{{$tt->anh}}" alt="" height="200px"></div>
							@if($tt->new ==1)<div class="product_extra product_new"><a href="categories.html">New</a></div>@endif
							<div class="product_content">
								<div class="product_title"><a href="product.html">{{$tt->pro_name}}</a></div>
								<div class="product_price"><?php echo number_format($tt->pro_gia)."đ"?></div>
							</div>
						</div>
						
@endforeach
						<!-- Product -->
						

					</div>

				</div>
			</div><div style=" margin-left: 500px">{{$sptt->links()}}</div>

		</div>
	</div>

	<!-- Newsletter -->

	

@endsection