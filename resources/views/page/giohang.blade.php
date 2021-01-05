@extends('master');
@section('content')
<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(sublime/images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
										<li><a href="{{route('show')}}">Hãng</a></li>
										<li>Giỏ hàng</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart Info -->
				<?php
					$content = Cart::content();
				?>
	<div class="cart_info">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Sản phẩm</div>
						<div class="cart_info_col cart_info_col_price">Giá</div>
						<div class="cart_info_col cart_info_col_quantity">Số lượng</div>
						<div class="cart_info_col cart_info_col_total">Tổng</div>
					</div>
				</div>
			</div>
			<div class="row cart_items_row">
				<div class="col">
					@foreach($content as $v_content)
					<!-- Cart Item -->
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img src="sublime/images/dt/{{$v_content->options->image}}" alt="" height="150px"></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="{{route('chitietsanpham',$v_content->id)}}">{{$v_content->name}}</a></div>
								<a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}">Xóa </a>
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price"><?php echo number_format($v_content->price)."đ"?></div>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<div class="product_quantity_container">
								<div class="product_quantity clearfix" style="margin-top: -50px ">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
										{{ csrf_field() }}
										<input name="cart_quantity" type="text" pattern="[0-9]*" value="{{$v_content->qty}}">
										<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Up" name="update_qty" class="btn btn-default btn-sm">
									</form>

								</div>
							</div>
						</div>
						<!-- Total -->
						<div class="cart_item_total"><?php echo number_format($v_content->qty * $v_content->price)."đ"?></div>
							 <input type="hidden" value=" {{$tong=$tong+ ($v_content->qty * $v_content->price)}}" >
							 <input type="hidden" value=" {{$tongqty=$tongqty + $v_content->qty }}" >
					</div>

					@endforeach

				</div>
			</div>
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="{{route('trangchu')}}">Tiếp tục mua hàng</a></div>
						
					</div>
				</div>
			</div>
			<div class="row row_extra">
				<div class="col-lg-4">
					
					<!-- Delivery -->
					
					<div class="delivery">
						<form action="{{URL::to('/thanh-toan')}}" method="post">
							{{csrf_field()}}
						<div class="section_title">Hình thức vận chuyển</div>
						<div class="section_subtitle">Chọn hình thức bạn muốnt</div>
						<div class="delivery_options">
							<label class="delivery_option clearfix">Giao ngay
								<input type="radio" name="radio" value="30000">
								<span class="checkmark"></span>
								<span class="delivery_price">30.000 đ</span>
							</label>
							<label class="delivery_option clearfix">Giao vào ngày hôm sau
								<input type="radio" name="radio" value="15000">
								<span class="checkmark"></span>
								<span class="delivery_price">15.000 đ</span>
							</label>
							<label class="delivery_option clearfix">Nhận hàng tại quầy
								<input type="radio" checked="checked" name="radio" value="0">
								<span class="checkmark"></span>
								<span class="delivery_price">Miễn phí</span>
							</label>
						</div>
					</div>
					@if(Session::has('user'))
					@if(Cart::count()==0)
						<p style="font-size: 30px ;color: red ;text-align: center">Giỏ hàng trống</p>
					@else
					<button type="submit" class="btn btn-secondary" style="margin-left: 70px;margin-top: 20px"> Tiến hành thanh toán</button>
					@endif
					@else 
						<div class="button checkout_button" style="margin-top: 30px"><a href="{{route('login')}}">Vui lòng đăng nhập để tiếp tục</a></div>
					@endif
				</form>


					<!-- Coupon Code -->
					<div class="coupon">
						<div class="section_title">Mã giảm giá</div>
						<div class="section_subtitle">Vui lòng nhập mã giảm giá</div>
						<div class="coupon_form_container">
							<form action="#" id="coupon_form" class="coupon_form">
								<input type="text" class="coupon_input" required="required">
								<button class="button coupon_button"><span>Apply</span></button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Tổng giỏ hàng</div>
						
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Tổng tiền</div>
									<div class="cart_total_value ml-auto"><?php echo number_format($tong)."đ"?></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Tổng số lượng</div>
									<div class="cart_total_value ml-auto">{{$tongqty}}</div>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>		
	</div>

@endsection