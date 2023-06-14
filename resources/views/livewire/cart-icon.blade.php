<div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{route('product.cart')}}">
                                        <img alt="Cart" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
                                        @if(Cart::count()>0)
                                            <span class="pro-count blue">{{Cart::count()}}</span>
                                        @endif
                                    </a>
                                    
                                    <!-- shopping cart -->
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            @foreach(Cart::content() as $item)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="{{route('product.details',['ctg'=> $item->model->ctg])}}"><img alt="{{($item->model->name)}}" src="{{asset('assets/imgs/shop/product-')}}{{$item->id}}-1.jpeg"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="{{route('product.details',['ctg'=> $item->model->ctg])}}">{{substr($item->model->name,0,20)}}...</a></h4>
                                                        <h4><span>{{$item->qty}} x </span>RM{{($item->model->oriPrice)}}</h4>
                                                    </div>
                                                    <!-- <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div> -->
                                                </li>
                                            @endforeach 
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>RM{{Cart::subtotal()}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{route('product.cart')}}" class="outline">View cart</a>
                                               
                                                <a href="{{ route('product.checkout') }}">Checkout</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                