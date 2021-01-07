@extends('index')
@section('content')
@if(Auth::check())
<?php
        $id_dathang = Auth::user()->id;        
?>

    @if(count($thongtin) == 0)
      
    <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="{{('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
                     <span>Thông tin của bạn</span>
                  </div>
               </div>
            </div>
            </div>
      <div class="alert alert-success" style="text-align: center;">
                               Bạn chưa có thông tin đặt hàng,vui lòng thêm <a href="themthongtin/{{Auth::user()->id}}">tại đây </a>.
                            </div>
                            @else
    <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="{{('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
                     <span>Thông tin của bạn</span>
                  </div>
               </div>
            </div>
         </div>
    <div class="healer">
    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Họ và tên</th>
                                    <th class="p-name">Số điện thoại</th>
                                    <th>Địa chỉ</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach($thongtin as $hang)
                                 @if($hang->id_thongtin == $id_dathang)
                                 <tr>
                                    <td>{{$hang->hovaten}}</td>
                                    <td class="cart-title first-row">
                                        <h5>{{$hang->sdt}}</h5>
                                    </td>
                                    <td>{{$hang->diachi}}</td>                                   
                                 </tr>
                                 @else
                                 <div class="alert alert-success" style="text-align: center;">
                                    Không tìm thấy thông tin của bạn,vui lòng thử lại !
                                    
                                 </div>
                                 @break
                                 @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    </div>
    @endif
    
@else
    <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="{{('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
                     <span>Đơn hàng đã đặt</span>
                  </div>
               </div>
            </div>
         </div>
                        <div class="alert alert-danger" style="text-align: center;">
                                Bạn chưa đăng nhập<br>
                                Vui lòng đăng nhập để xem thông tin đặt hàng !
                            </div>






@endif

@endsection