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
                    <span></span> Edit Product
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
                                        Edit Product
                                    </div>
                                    <div class="col-md-6"> 
                                        <a href="{{route('admin.products')}}" class="btn btn-success float-end">All Products</a> 
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                                @endif
                                <form wire:submit.prevent="editP">
                                @csrf
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter product name" wire:model="name" />
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="ctg" class="form-label">Slug</label>
                                        <input type="text" name="ctg" class="form-control" placeholder="Enter product slug" wire:model="ctg" />
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="shortDesc" class="form-label">Short Description</label>
                                        <textarea type="text" name="shortDesc" class="form-control" placeholder="Enter short description" wire:model="shortDesc" ></textarea>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea type="text" name="description" class="form-control" placeholder="Enter Description" wire:model="description" ></textarea>
                                     
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="oriPrice" class="form-label">Price</label>
                                        <input type="text" name="oriPrice" class="form-control" placeholder="Enter Price" wire:model="oriPrice" />
                                      
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="stockStatus" class="form-label" wire:model="stockStatus">Stock Status</label>
                                        <select class="form-control">
                                            <option value="instock">InStock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                       
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" name="quantity" class="form-control" placeholder="Enter quantity" wire:model="quantity" />
                                    
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label" wire:model="image">Image</label>
                                        <input type="file" name="image"class=" form-control" wire:model="newimg" />
                                        @if($newimg)
                                        {
                                            <img src="{{$image->temporaryUrl()}}" width="120" />
                                        }
                                        else{
                                            <img src="{{asset('asset/imgs/products')}}/{{$image}}" width="120" />
                                        }
                                        @endif
                                     
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="ctgId" class="form-label">Category</label>
                                        <select class="form-control" name="ctgId">
                                            <option value="">Select Category</option>  
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach 
                                        </select>
                                     
                                    </div>


                                    <button type="submit" class="btn btn-primary float-end">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
