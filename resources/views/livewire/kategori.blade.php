
<div>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                           
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by-dropdown-wrap">
                                            <span>Default Sorting<i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $orderBy == 'Price: Low to High' ? 'active' : '' }}"
                                                    href="#"
                                                    wire:click.prevent="changeSort('Price: Low to High')">Price: Low to
                                                    High</a></li>
                                            <li><a class="{{ $orderBy == 'Price: High to Low' ? 'active' : '' }}"
                                                    href="#"
                                                    wire:click.prevent="changeSort('Price: High to Low')">Price: High to
                                                    Low</a></li>
                                            <li><a class="{{ $orderBy == 'Latest Item' ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changeSort('Latest Item')">Latest Item</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @foreach($products as $product)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                        <a href="{{ route('product.details', ['ctg' => $ctg]) }}">
                                                    <img class="default-img"
                                                        src="{{ asset('assets/imgs/shop/product-') }}{{ $product->id }}-1.jpg"
                                                        alt="{{ $product->name }}">
                                                    <img class="hover-img"
                                                        src="{{ asset('assets/imgs/shop/product-') }}{{ $product->id }}-2.jpg"
                                                        alt="{{ $product->name }}">
                                                </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop.html"></a>
                                        </div>
                                        <h2><a href="product-details.html">{{$product->name}}</a></h2>
                                        <div class="product-price">
                                            <span>RM{{$product->oriPrice}} </span>   
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href= "{{route('product.cart')}}" wire:click.prevent = "store({{$product->id}},'{{$product->name}}',{{$product->oriPrice}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!--pagination --> 
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach ($categories as $category)
                                <li><a href="{{route('product.category',['ctg'=>$category->ctg])}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>   
</div>