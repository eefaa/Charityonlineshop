<div>
    <main class="main">
        <div class="container">
            <h1 class="text-center mt-5">Donation Page</h1>
            <div class="row justify-content-center mt-10">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                        @endif
                        <form method="post" action="{{ route('donate.store') }}">
                            @csrf
                                <div class="form-group">
                                    <input wire:model="amount" type="decimal" class="form-control" id="amount" name="amount" placeholder="Amount*" required>
                                    
                                </div>

                                <div class="form-group">
                                    <input wire:model="name" type="text" class="form-control" id="name" name="name" placeholder="Full Name*" required>
                                </div>

                                <div class="form-group">
                                    <input wire:model="phone" type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number*" pattern="[0-9]{10}" required >
                                </div>

                                <div class="form-group">
                                    <input wire:model="email" type="email" class="form-control" id="email" name="email" placeholder="Email*" required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" id="payment_method" name="payment_method">
                                        <option value="stripe">Debit/Credit card</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <!-- <button type="submit" class="btn btn-primary">Donate Now</button> -->
                                    <!-- <li><a href="{{route('donate.berjaya')}}">Orders</a></li> -->
                                    <button wire:click="saveOrder" class="btn btn-fill-out btn-block mt-30">Donate</button>
                                    <script src="http://js.stripe.com/v3/"></script>
                                    <script src="script.js"></script>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

