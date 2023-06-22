<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{ $products->total() }}</strong> items for you!
                                </p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{ $itmSize }} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $itmSize == 12 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changeItmSize(12)">12</a></li>
                                            <li><a class="{{ $itmSize == 15 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changeItmSize(15)">15</a></li>
                                            <li><a class="{{ $itmSize == 25 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changeItmSize(25)">25</a></li>
                                            <li><a class="{{ $itmSize == 32 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changeItmSize(32)">32</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span>Default Sorting<i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $orderBy == 'Default Sorting' ? 'active' : '' }}"
                                                    href="#"
                                                    wire:click.prevent="changeSort('Default Sorting')">Default
                                                    Sorting</a></li>
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
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', ['ctg' => $product->ctg]) }}">
                                                    <img class="default-img"
                                                        src="{{ asset('assets/imgs/shop/product-') }}{{ $product->id }}-1.jpeg"
                                                        alt="{{ $product->name }}">
                                                    <img class="hover-img"
                                                        src="{{ asset('assets/imgs/shop/product-') }}{{ $product->id }}-2.jpeg"
                                                        alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop.html"></a>
                                            </div>
                                            <h2><a href="product-details.html">{{ $product->name }}</a></h2>
                                            <div class="product-price">
                                                <span>RM{{ $product->oriPrice }} </span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up"
                                                    wire:click="store({{ $product->id }},'{{ $product->name }}',{{ $product->oriPrice }})"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!--pagination -->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{ $products->links() }}
                            <!-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav> -->
                        </div>
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
                                    <li><a
                                            href="{{ route('product.category', ['ctg' => $category->ctg]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                                <!-- <li><a href="shop.html">Blouses & Shirts</a></li>
                                <li><a href="shop.html">Dresses</a></li>
                                <li><a href="shop.html">Swimwear</a></li>
                                <li><a href="shop.html">Beauty</a></li>
                                <li><a href="shop.html">Jewelry & Watch</a></li>
                                <li><a href="shop.html">Accessories</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
