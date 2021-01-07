@extends('index')
@section('content')
@if(Auth::check())

            <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="{{('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
                     <span>Thêm thông tin nhận hàng</span>
                  </div>
               </div>
            </div>
            </div>
            <form action="{{ url('addthongtin') }}" method="POST" role="form">
            <legend class="btn btn-info">Vui lòng thêm đúng thông tin để nhận hàng</legend>
            {{ csrf_field()}}
            <div class="form-group">
            <label for="">Họ và tên:</label>
            <input type="text" name="hovaten" class="form-control" id="" placeholder="Họ và tên" required>
            <label for="">Số điện thoại:</label>
            <input type="text" name="sdt" class="form-control" id="" placeholder="Số điện thoại" required>
            <label for="">Địa chỉ nhận hàng:</label>
            <input type="text" name="diachi" class="form-control" id="" placeholder="Địa chỉ nhận hàng" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm thông tin</button>
            </form>
                    



@else
    <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="{{('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
                     <span>Thêm thông tin</span>
                  </div>
               </div>
            </div>
         </div>
                        <div class="alert alert-danger" style="text-align: center;">
                                Bạn chưa đăng nhập<br>
                                Vui lòng đăng nhập !
                            </div>
                            @endif                           
@endsection