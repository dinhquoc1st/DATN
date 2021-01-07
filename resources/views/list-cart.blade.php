<div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Save</th>
									<th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::has("Cart") != null)
                                @foreach(Session::get('Cart')->products as $item)
                                <tr>
                                    <td class="cart-pic first-row"><img src="assets/img/products/{{$item['productsInfo']->img}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$item['productsInfo']->tensach}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{number_format($item['productsInfo']->dongia)}}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input id="quanty-item-{{$item['productsInfo']->id}}" type="text" value="{{$item['quanty']}}">  
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{number_format($item['price'])}}</td>
                                    <td class="close-td first-row"><i onclick="SaveCartList({{$item['productsInfo']->id}});" class="ti-save"></i></td>
                                    <td class="close-td first-row"><i class="ti-close" onclick="DeleteCartList({{$item['productsInfo']->id}});"></i></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                @if(Session::has("Cart") != null)
                                <ul>
                                    <li class="subtotal">Subtotal <span>{{Session::get('Cart')->totalQuanty}}</span></li>
                                    <li class="cart-total">Total <span>{{number_format(Session::get('Cart')->totalPrice)}}</span></li>
                                </ul>
                                <a href="{{url('Pay')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>