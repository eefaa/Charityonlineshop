<div>
    <div main class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1>User Profile</h1>

                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <form wire:submit.prevent="updateProfile">
                    @csrf
                    <div class="form-group">
                            <label for="phone">Name</label>
                            <input wire:model="name" type="text" class="form-control" id="name">
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input wire:model="email" type="email" class="form-control" id="email">
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input wire:model="phoneNumber" type="text" class="form-control" id="phoneNumber">
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea wire:model="address" class="form-control" id="address" rows="3"></textarea>
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
