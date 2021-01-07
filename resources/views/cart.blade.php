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
   <input hidden id="total-quanty-card" type="number" value="{{Session::get('Cart')->totalQuanty}}">
</div>
</div>
@endif
