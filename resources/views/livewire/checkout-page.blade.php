<div>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Delivery Address</h4>
                            <div>
                                <label for="name">Name:</label>
                                <span id="name">{{ $name }}</span>
                            </div>
                            <div>
                                <label for="phone">Phone:</label>
                                <span id="phone">{{ $phone }}</span>
                            </div>
                            <div>
                                <label for="address">Address:</label>
                                <span id="address">{{ $address }}</span>
                            </div>
                        </div>
                        <!-- <div class="divider mt-50 mb-50"></div>
                        <form wire:submit.prevent="updateAddress">
                            <div class="ship_detail">
                                <div class="form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                            <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress"><span>Ship to a different address?</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseAddress" class="different_address collapse in">
                                    <div class="form-group">
                                        <input type="text" required="" name="fname" placeholder="Full Name *" wire:model="n_name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="billing_address" required="" placeholder="Address *" wire:model="n_address">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="billing_address2" required="" placeholder="Address line2" wire:model="n_address2">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" name="city" placeholder="City / Town *" wire:model="n_address">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" name="state" placeholder="State / County *" wire:model="n_state">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *" pattern="[0-9]{5}" wire:model="n_zipcode">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="integer" name="phone" placeholder="Phone Number *" wire:model="n_phone">
                                    </div>
                                    <button type="submit">Update</button>
                                </div>
                            </div>
                        </form>-->
                    </div> 
                    <div class="col-md-6">
                        <div class="order_review"> 
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <tbody>
                                    @foreach(Cart::content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{asset('assets/imgs/shop/product-')}}{{$item->id}}-1.jpeg" alt="#"></td>
                                            <td class="text-left">
                                                <h5><a href="product-details.html">{{$item->model->name}}</a></h5>
                                                <h5><span>RM{{$item->model->oriPrice}}</span></h5>
                                                <span class="product-qty">x{{$item->qty}}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">RM {{Cart::subtotal()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>RM 5</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">RM {{Cart::subtotal()+ 5}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#stripe\" aria-controls="stripe">Debit/Credit</label>                                        
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>    -->
                            <button wire:click="saveOrder" class="btn btn-fill-out btn-block mt-30">Checkout</button>
                            <script src="http://js.stripe.com/v3/"></script>
                            <script src="script.js"></script>

                            <!-- <button wire:click="saveOrder" class="btn btn-fill-out btn-block mt-30">Checkout</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
