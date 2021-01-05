    @extends('admin')
@section('content')
<div class="table-responsive table--no-card m-b-30">
    <table class="table table-borderless table-striped table-earning">
        <thead>
            <tr>
                <th>Ngày tạo </th>
                <th>Mã hóa đơn</th>
                <th>Tên người mua</th>
                <th class="text-right"></th>
            </tr>@foreach($hd as $h)
        </thead>
        <tbody>
           <tr>
                <td>{{$h->hd_creatat}}</a></td>
                <td>{{$h->id}}</td>
                <td>
                @foreach($user as $u)
                    @if($u->id == $h->hd_user)
                        {{$u->ten}}
                        @endif

                @endforeach    
                </td>
                <td class="text-right"><a href="{{route('chitiethoadon',$h->id)}}">Chi tiết</a></td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>

@endsection