
<x-app-layout>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> Register
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Create an Account</h3>
                                        </div> 
                                        <!-- //register form                                        -->
                                        <form method="post" action="{{route('register')}}">
                                        @csrf
                                            <div class="form-group">
                                                <input type="text" required="" name="name" placeholder="Name"  :value="old('name')" required autofocus="name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Email"  :value="old('email')" required >
                                            </div>
                                            <div class="form-group">
                                                <input required type="password" name="password" placeholder="Password" required autocomplete="new-password" >
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                                            </div>
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                         
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Submit &amp; Register</button>
                                            </div>
                                            @if(Session::has('message'))
                                                <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                                            @endif
                                        </form>                                        
                                        <div class="text-muted text-center">Already have an account? <a href="{{route('login')}}">Sign in now</a></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-lg-6">
                               <img src="assets/imgs/login.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>

