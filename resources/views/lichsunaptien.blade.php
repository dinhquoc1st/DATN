@extends('index')
@section('content')
<div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="{{('index')}}"><i class="fa fa-home"></i> Trang chủ</a>
                     <span>Lịch sử nạp tiền</span>
                  </div>
               </div>
            </div>
            </div>
    <table class="table" style="text-align: center">
        
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Người nạp (SDT)</th>
                <th scope="col">Mã giao dịch MOMO</th>
                <th scope="col">Số tiền nạp</th>
                <th scope="col">Thời gian nạp</th>
            </tr>
            </thead>
      
        <tbody>   
                <tr>
                    <th scope="row">1</th>
                    <td>0914368291</td>
                    <td>8782291514</td>
                    <td style="color:green;">+10000</td>
                    <td>2021-01-05 10:23:57</td>
                </tr>
                
          
        </tbody>
      </table>
</div>
@endsection