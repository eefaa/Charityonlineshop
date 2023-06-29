<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> All Products
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6"> 
                                         All Products
                                    </div>
                                    <div class="col-md-6"> 
                                        <a href="{{route('admin.product.add')}}" class="btn btn-success float-end">Add Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                                @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        
                                        $i = ($products->currentPage()-1)*$products->perPage();
                                    @endphp
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            @php
                                            

                                                if($product->img == null){
                                                    $img_source = asset('assets/imgs/shop/product-') . $product->id . '-1.jpg';

                                                }else
                                                 $img_source = asset('assets/imgs/shop') . "/" . $product->img ;

                                            @endphp
                                            <td><img src="{{ $img_source }}"  alt="{{$product->name}}" width="60"/></td>
                                            <!-- <td><img src="{{asset('assets/imgs/products/') . '/' . $product->img}}"  alt="{{$product->name}}" width="60"/></td> -->
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->oriPrice}}</td>
                                            <td>{{ optional($product->category)->name }}</td>
                                            <td>{{$product->stockStatus}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td> 
                                                <a href="{{ route('admin.product.edit', [$product->id]) }}" class="text-info">Edit</a>
                                                <a href="#" onclick="deleteDialog({{$product->id}})" style="margin-left:20px;" class="text-danger">Delete </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">{{$products->links()}}</div> -->
                        </div> 
                    </div>
                </div> 
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Do you want to delete this category?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteDialog">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteP()" style="background-color: purple;">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
        <script>
            function deleteDialog(id)
            {
                @this.set('productId',id);
                $('#deleteDialog').modal('show');
            }

            function deleteP()
            {
                @this.call('deleteP');
                $('#deleteDialog').modal('hide');
            }
        </script>
@endpush

