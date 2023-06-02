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
                    <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Already have an account?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="toggle_info">
                            <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Have a coupon?</span> <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                        </div>
                        <div class="panel-collapse collapse coupon_form " id="coupon">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have a coupon code, please apply it below.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Coupon Code...">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn  btn-md" name="login">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Delivery Address</h4>
                            <p style="font-size: 14px; margin-top: 10px;">Iffah Najihah | 0192580969</p>
                            <p style="font-size: 14px;">Banting, Selangor</p>
                        </div>
                        <button onclick="showAddressForm()" class="btn btn-primary mb-4">Change Address</button>
                        <div id="addressForm" style="display: none;">
                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name">
                                </div>

                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Enter phone number">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter address">
                                </div>

                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" placeholder="Enter state">
                                </div>

                                <div class="form-group">
                                    <label for="postalCode">Postal Code</label>
                                    <input type="text" class="form-control" id="postalCode" placeholder="Enter postal code">
                                </div>

                                <button type="submit" class="btn btn-primary">Save Address</button>
                            </form>
                        </div>
                        <script>
                            function showAddressForm() {
                                var addressForm = document.getElementById("addressForm");
                                addressForm.style.display = "block";
                            }
                        </script>
                        <!-- <form method="post">
                            <div class="form-group">
                                <input type="text" required="" name="fname" placeholder="First name *">
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="lname" placeholder="Last name *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="cname" placeholder="Company Name">
                            </div>
                            <div class="form-group">
                                <div class="custom_select">
                                    <select class="form-control select-active">
                                        <option value="">Select an option...</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="billing_address" required="" placeholder="Address *">
                            </div>
                            <div class="form-group">
                                <input type="text" name="billing_address2" required="" placeholder="Address line2">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="city" placeholder="City / Town *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="state" placeholder="State / County *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="phone" placeholder="Phone *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="email" placeholder="Email address *">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>Create an account?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="collapsePassword" class="form-group create-account collapse in">
                                <input required="" type="password" placeholder="Password" name="password">
                            </div>
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
                                        <input type="text" required="" name="fname" placeholder="First name *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" name="lname" placeholder="Last name *">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" name="cname" placeholder="Company Name">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom_select">
                                            <select class="form-control select-active">
                                                <option value="">Select an option...</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AF">Afghanistan</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="billing_address" required="" placeholder="Address *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="billing_address2" required="" placeholder="Address line2">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" name="city" placeholder="City / Town *">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" name="state" placeholder="State / County *">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Order notes"></textarea>
                            </div>
                        </form> -->
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <!-- <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead> -->
                                    <tbody>
                                    @foreach(Cart::content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{asset('assets/imgs/shop/product-')}}{{$item->id}}-1.jpg" alt="#"></td>
                                            <td class="text-left">
                                                <h5><a href="product-details.html">{{$item->model->name}}</a></h5>
                                                <h5><span>RM{{$item->model->oriPrice}}</span></h5>
                                                <span class="product-qty">x{{$item->qty}}</span>
                                            </td>
                                            <!-- <td class="price" data-title="Price"><span>RM{{$item->model->oriPrice}}</span></td> -->
                                        </tr>
                                        <!-- <tr>
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
                                        </tr> -->
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
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>                                        
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>                                        
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('payment')}}" class="btn btn-fill-out btn-block mt-30">Place Order</a>
                        </div>
                    </div>
                        </div>
            </div>
        </section>
    </main>
</div>
