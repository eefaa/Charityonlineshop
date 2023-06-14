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
                <div class ="row">
                    <div class="col-md-3">
                        <lable>Filter by Date</lable>
                        <input type = "date" name = "date" value="{{date('Y-m-d'}}" class = "form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6"> 
                                         All Oders
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Id</th>
                                        <th>User Id</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <!-- <td>{{++$i}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->oriPrice}}</td>
                                            <td>{{ optional($product->category)->name }}</td>
                                            <td>{{$product->stockStatus}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>  -->
                                                <a href=# class="text-info">Edit</a>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>



