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
                    <span></span> Orders
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
                                         All Orders
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
                                        <th>Order Id</th>
                                        <th>User Id</th>
                                        <th>Address</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Tracking No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($orders->currentPage()-1)*$orders->perPage();
                                    @endphp
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->user_id}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->product_name}}</td>
                                            <td>{{$order->product_price}}</td>
                                            <td>{{$order->quantity}}</td>
                                            <td>{{$order->subtotal}}</td>
                                            <td>
                                                <select wire:change="updateStatus({{ $order->id }} , $event.target.value)">
                                                    <option value="To Ship" @if($order->status == 'To Ship') selected @endif>To Ship</option>
                                                    <option value="To Receive" @if($order->status == 'To Receive') selected @endif> To Receive</option>
                                                    <option value="Completed" @if($order->status == 'Completed') selected @endif>Completed</option>
                                                </select>
                                            </td>

                                            <td>{{$order->tracking_no}}</td>
                                            <td> 
                                                <a href="{{ route('admin.order.edit', ['orderId' => $order->id]) }}" class="text-info">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>



