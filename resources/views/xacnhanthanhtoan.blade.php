@extends('index')
@section('content')
@if(Auth::check())
    @if(count($xacnhan) == 0)
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
                               Bạn chưa có thông tin đặt hàng,vui lòng thêm.
                            </div>
            @else
    <div class="row">
      <div class="col l8">
        <h4 class="btn btn-info">
          Vui lòng chọn đúng thông tin và địa chỉ người nhận hàng:
        </h4>
       
        <select multiple class="form-control" name="thongtinnhanhang" id="thongtin">
            @foreach($xacnhan as $xacnhanthanhtoan)
            <option value="volvo">{{$xacnhanthanhtoan->hovaten}} - {{$xacnhanthanhtoan->sdt}} - {{$xacnhanthanhtoan->diachi}}</option>
            @endforeach  
        </select>
                   
        
          <h3 class="btn btn-info">Chọn hình thức thanh toán</h3>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
              Thanh toán  tiền mặt khi nhận hàng
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
              Thanh toán online
            </label>
          </div>
          
                <a href="{{url('Pay')}}" class="btn btn-primary">ĐẶT MUA</a>
                <br>
                <br>
              <p class="btn btn-success">(Xin vui lòng kiểm tra lại giỏ hàng trước khi đặt mua)</p>
            <p><a href="{{url('listCart')}}" class="btn btn-info">XEM LẠI GIỎ HÀNG</a></p>
          </div>
      </div>
      
        </div>
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
                                Vui lòng đăng nhập !
                            </div>
                            @endif                           
@endsection