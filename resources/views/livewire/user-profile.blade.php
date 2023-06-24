<div>
    <div main class="main">
        <div class="container">
            <h1 class="text-center mt-5">User Profile</h1>
            <div class="row justify-content-center mt-10">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                            @endif

                            <form wire:submit.prevent="updateProfile">
                            @csrf
                                <div class="form-group">
                                    <label for="phone">Name</label>
                                    <input wire:model="name" type="text" class="form-control" id="name" required>
                                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input wire:model="email" type="email" class="form-control" id="email" required>
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input wire:model="phone" type="text" class="form-control" id="phoneNumber" pattern="[0-9]{10}" required>
                                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea wire:model="address" class="form-control" id="address" rows="3" required></textarea>
                                    @error('address') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
