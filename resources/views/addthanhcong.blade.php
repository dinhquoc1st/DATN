@extends('index')
@section('content')
@if(Auth::check())
<?php
        $id_thongtin = Auth::user()->id;   
         
?>
    
    
    <?php
        $hovaten = $addthongtin['hovaten'];
        $sdt = $addthongtin['sdt'];
        $diachi = $addthongtin['diachi'];
        DB::table('thongtin')->insert(
            ['id_thongtin' => $id_thongtin,'hovaten' => $hovaten,'sdt' => $sdt,'diachi' => $diachi]
        );

    ?>
    
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
                                Bạn đã thêm thành công !
                            </div>

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
