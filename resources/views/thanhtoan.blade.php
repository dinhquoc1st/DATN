@extends('index')
@section('content')
@if(Auth::check())
<?php
        $id_dathang = Auth::user()->id;       
?>
@if(Session::has("Cart") != null)
@foreach(Session::get('Cart')->products as $item)
<?php
        $id = $item['productsInfo']->id;
        $tensach =$item['productsInfo']->tensach;
        $tacgia = $item['productsInfo']->tacgia;
        $soluong = $item['quanty'];
        $dongia =$item['productsInfo']->dongia;
        $img = $item['productsInfo']->img;
        $thanhtien = $item['quanty'] * $item['productsInfo']->dongia;
        DB::table('dathang')->insert(
            ['id_dathang' => $id_dathang,'tensach' => $tensach,'tacgia' => $tacgia,'dongia' => $dongia,'soluong' => $soluong,'thanhtien' => $thanhtien,'img' => $img]
        );
        Session()->forget('Cart');
        
        

?>
    
    
        





@endforeach
<div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="{{('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
                     <span>Đặt hàng</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="alert alert-success" style="text-align: center;">
                                Bạn đã đặt hàng thành công !
                            </div>
@else
<div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="{{('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
                     <span>Đặt hàng</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="alert alert-success" style="text-align: center;">
                                Bạn chưa có gì trong giỏ hàng để tiến hành đặt hàng,vui lòng thêm sản phẩm rồi thử lại !
                            </div>
@endif
@else
            <div class="alert alert-danger" style="text-align: center;">
                                Bạn chưa đăng nhập<br>
                                Vui lòng đăng nhập để đặt hàng !
                            </div>

@endif
@endsection