<header class="header-section">
   <div class="header-top">
      <div class="container">
         <div class="ht-left">
            <div class="mail-service">
               <i class=" fa fa-envelope"></i>
               dinhquoc1st@gmail.com
            </div>
            <div class="phone-service">
               <i class=" fa fa-phone"></i>
               0914368291
            </div>
         </div>
         <div class="ht-right">
            @if(Auth::check())
            <div class="dropdown">
               <button class="btn btn-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Xin chào, {{Auth::user()->ten}}
               </button>
               
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="dathang/{{Auth::user()->id}}">Xem đơn hàng đã đặt</a>
               <a class="dropdown-item" href="thongtindathang/{{Auth::user()->id}}">Xem thông tin nhận hàng</a>
               <a class="dropdown-item" href="themthongtin/{{Auth::user()->id}}">Thêm thông tin nhận hàng</a>
               <a class="dropdown-item" href="logout">Đăng xuất</a>
                  
               </div>
            </div>
            @else
            <div class="dropdown">
               <button class="btn btn-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Bạn chưa đăng nhập
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <p class="dropdown-item"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               Đăng nhập
               </button></p>
               
               <p class="dropdown-item"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
               Đăng ký
               </button></p>
                  
               </div>
            </div>
            @endif
         </div>
         
      </div>
   </div>
   </div>
   @if(count($errors) > 0)
                            <div class="alert alert-danger" alight="center" style="text-align: center;">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('loi'))
                            <div class="alert alert-danger" style="text-align: center;">
                            {{session('loi')}}
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success" style="text-align: center;">
                                {{(session('thongbao'))}}
                            </div>
                        @endif                 
   <div class="container">
      <div class="inner-header">
         <div class="row">
            <div class="col-lg-2 col-md-2">
               <div class="logo">
                  <a href="index">
                  <img src="assets/img/logo.png" alt="">
                  </a>
               </div>
            </div>
            <div class="col-lg-7 col-md-7">
            </div>
            <div class="col-lg-3 text-right col-md-3">
               <ul class="nav-right">
                  
                  <li class="cart-icon">
                     <a href="listCart">
                     <i class="icon_bag_alt"></i>
                     @if(Session::has("Cart") != null)
                     <span id="total-quanty-show">{{Session::get('Cart')->totalQuanty}}</span>
                     @else
                     <span id="total-quanty-show">0</span>
                     @endif
                     </a>
                     <div class="cart-hover">
                        <div id="change-item-cart">
                           @if(Session::has("Cart") != null)
                           <div class="select-items">
                              <table>
                                 <tbody>
                                    @foreach(Session::get('Cart')->products as $item)
                                    <tr>
                                       <td class="si-pic"><img src="assets/img/products/{{$item['productsInfo']->img}}" alt=""></td>
                                       <td class="si-text">
                                          <div class="product-selected">
                                             <p>{{number_format($item['productsInfo']->dongia)}}₫ x {{$item['quanty']}}</p>
                                             <h6>{{$item['productsInfo']->tensach}}</h6>
                                          </div>
                                       </td>
                                       <td class="si-close">
                                          <i class="ti-close" data-id="{{$item['productsInfo']->id}}"></i>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                           <div class="select-total">
                              <span>total:</span>
                              <h5>{{number_format(Session::get('Cart')->totalPrice)}}₫</h5>
                           </div>
                           @endif
                        </div>
                        <div class="select-button">
                           <a href="{{url('listCart')}}" class="primary-btn view-card">Xem giỏ hàng</a>
                           <a href="{{url('Pay')}}" class="primary-btn checkout-btn">Đặt hàng</a>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- Button trigger modal -->
      

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            @if(count($errors) > 0)
                            <div class="alert alert-danger" alight="center">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('loi'))
                            <div class="alert alert-danger" style="text-align: center;">
                            {{session('loi')}}
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success" style="text-align: center;">
                                {{(session('thongbao'))}}
                            </div>
                        @endif            
            <form role="form" action="dangnhap" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
            </div>
         </div>
      </div>
      </div>
      <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                         
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Đăng Ký</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="register" method="POST" id="form-register">
                    @csrf
                    <div class="form-group" style="text-align: left">
                        <label for="email">Họ Tên:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                        <span class="error-form" style="color: red"></span>
                    </div>
                    <div class="form-group" style="text-align: left">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        <span class="error-form" style="color: red"></span>
                    </div>
                    <div class="form-group" style="text-align: left">
                        <label for="pwd">Mật Khẩu:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
                        <span class="error-form" style="color: red"></span>
                    </div>
                    
                    <button type="submit" class="btn btn-primary js-btn-login">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
   <div class="nav-item">
      <div class="container">
         
         <nav class="nav-menu mobile-menu">
            <ul>
            <li><a href="index"></a></li>
               <li><a href="index">Home</a></li>
               <li><a href="#">Shop</a></li>
               <li><a href="#">Collection</a></li>
               <li><a href="#">Blog</a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="#">Pages</a></li>
            </ul>
         </nav>
         <div id="mobile-menu-wrap"></div>
      </div>
   </div>
</header>