@extends('master');
@section('content')
<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(sublime/images/contact.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.html">Trang chủ</a></li>
										<li>Liên hệ</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->
	
	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
						<div class="section_title">Thông tin liên hệ</div>
						<div class="section_subtitle"></div>
						<div class="contact_form_container">
							<form action="#" id="contact_form" class="contact_form">
								<div class="row">
									<div class="col-xl-6">
										<!-- Name -->
										<label for="contact_name">Họ*</label>
										<input type="text" id="contact_name" class="contact_input" required="required">
									</div>
									<div class="col-xl-6 last_name_col">
										<!-- Last Name -->
										<label for="contact_last_name">Tên*</label>
										<input type="text" id="contact_last_name" class="contact_input" required="required">
									</div>
								</div>
								<div>
									<!-- Subject -->
									<label for="contact_company">Email</label>
									<input type="text" id="contact_company" class="contact_input">
								</div>
								<div>
									<label for="contact_textarea">Nội dung*</label>
									<textarea id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
								</div>
								<button class="button contact_button"><span>Gửi</span></button>
							</form>
						</div>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="col-lg-3 offset-xl-1 contact_col">
					<div class="contact_info">
						<div class="contact_info_section">
							<div class="contact_info_title">Quảng cáo</div>
							<ul>
								<li>Phone: <span>+84 931 321 123</span></li>
								<li>Email: <span>dh51601452@student.stu.edu.vn</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Đổi trả hàng</div>
							<ul>
								<li>Phone: <span>+84 931 321 123</span></li>
								<li>Email: <span>dh51601452@student.stu.edu.vn</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Thông tin cá nhân</div>
							<ul>
								<li>Phone: <span>+84 931 321 123</span></li>
								<li>Email: <span>dh51601452@student.stu.edu.vn</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row map_row">
				
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.950073376729!2d106.67625481426643!3d10.738331462833367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f62a90e5dbd%3A0x674d5126513db295!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBDw7RuZyBOZ2jhu4cgU8OgaSBHw7Ju!5e0!3m2!1svi!2s!4v1587146158559!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					<!-- Google Map -->
					
			</div>
		</div>
	</div>
@endsection