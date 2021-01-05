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
								<div class="home_title">Từ khóa {{$keyword}}<span>.</span></div>
								
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
				<div class="col-lg-6"></div>

				<!-- Product Content -->
				<div class="col-lg-6"></div>
			</div>

		
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Kết Quả Tìm Kiếm</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">


						@foreach($sanpham_timkiem as $key=>$product)
						<div class="product">
							<a href="{{route('chitietsanpham',$product->id)}}">
							<div class="product_image"><img src="sublime/images/dt/{{$product->anh}}" alt=""></div>

							@if($product->new ==1)<div class="product_extra product_new"><a href="categories.html">New</a></div>@endif
							<div class="product_content">
								<div class="product_title"><a href="product.html">{{$product->pro_name}}</a></div>
								<div class="product_price"><?php echo number_format($product->pro_gia)."đ"?></div>
							</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	

@endsection