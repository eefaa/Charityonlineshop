<div>
    <main class="main">
        <div class="container">
            <h1 class="text-center mt-5">Donation Page</h1>
            <div class="row justify-content-center mt-10">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        <form wire:submit="storeDonate" action="{{ route('donate') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Donation Amount</label>
                                    <input wire:model="amount" type="decimal" class="form-control" id="amount" name="amount" placeholder="ex: 10" required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input wire:model="name" type="text" class="form-control" id="name" name="name" placeholder="ex: John Sinar" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input wire:model="phone" type="tel" class="form-control" id="phone" name="phone" placeholder="ex: +60123456789" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input wire:model="email" type="email" class="form-control" id="email" name="email" placeholder="ex: user@user.com" required>
                                </div>

                                <div class="form-group">
                                    <label for="payment_method">Payment Method</label>
                                    <select class="form-control" id="payment_method" name="payment_method">
                                        <option value="paypal">Stripe</option>
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Donate Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

