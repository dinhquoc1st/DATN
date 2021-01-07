
@extends('index')
@section('content')
@if(Auth::check())
    @if(count($dathang) == 0)
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
    <div class="alert alert-success" style="text-align: center;">
                               Bạn chưa có lịch sử giao dịch
                            </div>

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
    <div class="healer">
    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Tên sách</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dathang as $hang)
                                <tr>
                                    <td class="cart-pic first-row"><img src="assets/img/products/{{$hang->img}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$hang->tensach}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{number_format($hang->dongia)}}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <h5>{{$hang->soluong}}</h5>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{number_format($hang->thanhtien)}}</td>
                                </tr>
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
                                Vui lòng đăng nhập kiểm tra lịch sử đặt hàng !
                            </div>






@endif
@endsection