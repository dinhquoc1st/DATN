@extends('index')
@section('content')
<div class="breacrumb-section">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="{{('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
                     
                     <span>Chi tiết sản phẩm: </span>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="product-shop spad">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 order-1 order-lg-2">
                  <div class="product-list">
                     <div class="row">
                        @foreach($products1 as $prd)
                        <div class="col-lg-4 col-sm-6">
                           <div class="product-item">
                              <div class="pi-pic">
                                 <img src="assets/img/products/{{$prd->img}}" alt="">
                                 <div class="sale pp-sale">Sale</div>
                                 <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                 </div>
                                 <ul>
                                    
                                    <li class="quick-view"><a onclick="AddCart({{$prd->id}} )" href="javascript:">+ Thêm vào giỏ hàng</a></li>
                                    
                                 </ul>
                              </div>
                              <div class="pi-text">
                                 <div class="catagory-name"><p>Tác giả: {{$prd->tacgia}}</p></div>
                                 <a href="#">
                                    <h5>Sách: {{$prd->tensach}}</h5>
                                 </a>
                                 <div class="product-price">
                                    {{number_format($prd->dongia)}}₫
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                        <h4>MÔ TẢ SẢN PHẨM:</h4>
                        <br>
                        {{$prd->mota}}
                        </div>
                        <div class="col-lg-4 col-sm-6">
                        <img src="assets/img/products/{{$prd->img2}}" alt="">
                        </div>
                        @endforeach
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>

@endsection