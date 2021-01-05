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
										<li><a href="index.html">Trang chủ</a></li>
										<li><a href="cart.html">Giỏ hàng</a></li>
										<li>Thanh toán</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
				$content = Cart::content();
				
				?>
				
<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Thông tin của bạn </div>
						
						<div class="checkout_form_container">
							<form action="#" id="checkout_form" class="checkout_form">
								<div>
									<!-- Address -->
									<label for="checkout_address">Họ tên *</label>
									<input name="hoten" type="text" id="checkout_address" class="checkout_input" required="required" value="{{$thongtin->ten}}">
									
								</div>
								<div>
									<!-- Company -->
									<label for="checkout_company">Địa chỉ*</label>
									<input type="text" id="checkout_company" class="checkout_input" value="{{$thongtin->diachi}}">
								</div>
								<div>
									<!-- Phone no -->
									<label for="checkout_phone">Số điện thoại*</label>
									<input type="phone" id="checkout_phone" class="checkout_input" required="required" value="{{$thongtin->user_phone}}">
								</div>
								<div>
									<!-- Email -->
									<label for="checkout_email">Email*</label>
									<input name="email" type="phone" id="checkout_email" class="checkout_input" required="required" value="{{$thongtin->user_email}}">
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->
				
				
			
				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Thông tin đơn đặt hàng</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title"><b style="font-size: 20px">Sản phẩm</b></div>
								<div class="order_list_value ml-auto"><b style="font-size: 20px">Tiền</b></div>
							</div>
							<ul class="order_list">
								@foreach($content as $v_content)
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title"><i style="font-size: 15px">{{$v_content->name}}</i></div>
									<div class="order_list_value ml-auto"><i style="font-size: 15px"><?php echo number_format($v_content->price)."đ" ?> </i></div>
									<input type="hidden" value="{{$tong=$tong+($v_content->qty * $v_content->price)}}">
								</li>
								@endforeach
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title"><b style="font-size: 20px">Giá tiền</b></div>
									<div class="order_list_value ml-auto"><b style="font-size: 16px"><?php echo number_format(($v_content->price * $v_content->qty))."đ"?></b></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title"><b style="font-size: 20px">Ship</b></div>
									<div class="order_list_value ml-auto"><b style="font-size: 16px"><?php echo number_format($ship)."đ"?>  </b></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title"><b style="font-size: 20px">Tổng cộng</b></div>
									<div class="order_list_value ml-auto"><b style="font-size: 16px"><?php echo number_format($tong + $ship)."đ"?></b></div>
								</li>
							</ul>
						</div>
	
						<!-- Payment Options -->

						<!-- Order Text -->
						
						<div class="button order_button" onclick="dathang()"><a href="{{route('payment')}}">Đặt hàng</a></div>

					</div>
				</div>
			</div>
		</div>
	</div>
<script language="javascript">
      // Hàm show kết quả
      function dathang()
      {
        alert("Đặt hàng thành công , hệ thống sẽ liên lạc với bạn")
      }
    </script>
	@endsection