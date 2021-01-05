@extends('master')
@section('content')

	<div class="main" style="margin-top: 200px">
		<p style="margin-left: 300px ; font-size: 50px">Xin chào {{Session::get('user')}}</p>
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
            	<label style="font-size: 20px ;color : black">Lịch sử đặt hàng</label><br />
					<table border="3" style="margin:auto">
						<tr><td style="padding-left:50px;padding-right: 0px ;padding-top: 10px ;padding-bottom: 10px ; font-size: 20px;color: green">
						Ngày đặt
						</td>
						<td style="padding-left:50px;padding-right: 0px ;padding-top: 10px ;padding-bottom: 10px ; font-size: 20px ;color: green">Mã đơn</td>
						<td style="padding-left:50px;padding-right: 0px ;padding-top: 10px ;padding-bottom: 10px ; font-size: 20px;color: green">Trạng thái</td>
						<td style="padding-left:50px;padding-right: 0px ;padding-top: 10px ;padding-bottom: 10px ; font-size: 20px;color: green"></td>
					</tr>
						@foreach($hd as $h)
							<tr>
								<td style="padding-left:50px;padding-right: 90px ;padding-top: 10px ;padding-bottom: 10px ; font-size: 20px"><span style="color: black"> 
									{{$h->hd_creatat}}</span>
								</td>
								<td style="padding-left:70px;padding-right: 50px ;padding-top: 10px ;padding-bottom: 10px ; font-size: 20px"><span style="color: black"> {{$h->id}}</span></td>
								<td style="padding-left:50px;padding-right: 50px ;padding-top: 10px ;padding-bottom: 10px ; font-size: 20px">
									@if($h->hd_status == 0 )
									<span style="color :red">	Chưa xác nhận</span>
									@endif
									@if($h->hd_status == 1 )
									<span style="color :red">	Đã xác nhận</span>
									@endif
									@if($h->hd_status == 2 )
									<span style="color :red">	Đang giao</span>
									@endif
									@if($h->hd_status == 3 )
									<span style="color :red">	Đã giao</span>
									@endif
									@if($h->hd_status == 4 )
										<span style="color :red">Đã hủy</span>
									@endif
								</td>

								<td>
									@if($h->hd_status==0)
									 <form action="{{URL::to('/huy')}}" method="post">
									 	{{csrf_field()}}
									 	<input type="hidden" name="idhidden" value="{{$h->id}}">
									<button class="btn btn-secondary" type="submit">Hủy</button>
								</form>
								@else 
								 <span style="color: black ;font-size: 15px"><b>Không thể hủy<b></span>
								@endif
								
							</td>
							</tr>


						@endforeach

						
					</table>


            </div>
         </div>
      </div>
@endsection