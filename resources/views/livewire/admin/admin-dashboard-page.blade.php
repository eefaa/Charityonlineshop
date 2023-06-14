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
        <section class="mt-50 mb-50">
            <div class="container">
                <div class = "row">
                    <!-- <div class = "col-md-3">
                        <div class ="card card-body bg-primary text-white mb-3">
                            <lable>Total User</lable>
                            <h1>{{$totalUser}}</h1>
                        </div>
                    </div> -->
                    <div class = "col-md-3">
                        <div class ="card card-body bg-success text-white mb-3">
                            <lable>Today Sales</lable>
                            <h1>{{$todaySale}}</h1>
                        </div>
                    </div>
                    <div class = "col-md-3">
                        <div class ="card card-body bg-warning text-white mb-3">
                            <lable>Month Sales</lable>
                            <h1>{{$monthSale}}</h1>
                        </div>
                    </div>
                    <div class = "col-md-3">
                        <div class ="card card-body bg-primary text-white mb-3">
                            <lable>Total Sales</lable>
                            <h1>{{$yearSale}}</h1>
                        </div>
                    </div>
                </div>
                <hr>
                <div class = "row">
                    <div class = "col-md-3">
                        <div class ="card card-body bg-success text-white mb-3">
                            <lable>Today Orders</lable>
                            <h1>{{$todayOrder}}</h1>
                        </div>
                    </div>
                    <div class = "col-md-3">
                        <div class ="card card-body bg-warning text-white mb-3">
                            <lable>Month Orders</lable>
                            <h1>{{$monthOrder}}</h1>
                        </div>
                    </div>
                    <div class = "col-md-3">
                        <div class ="card card-body bg-primary text-white mb-3">
                            <lable>Total Orders</lable>
                            <h1>{{$yearOrder}}</h1>
                        </div>
                    </div>
                </div>
                </hr>
                <div class ="row">
                    <div class="col-md-3">
                        <label>Filter by Year</label>
                        <input type="year" name="year" wire:model="year" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <label>Filter by Month</label>
                        <input type="month" name="month" wire:model="month" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <lable>Filter by Date</lable>
                        <input type="date" name="date" wire:model="date" class="form-control" />
                    </div> 
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6"> 
                                        Orders
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                  
                                    <tr>
                                        <th>Order Id</th>
                                        <th>User Id</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                      @foreach($orders as $order)
                                      @if(empty(request('date')) || $order->created_at->format('Y-m-d') == request('date'))
                                      <tr>
                                        <td>{{$order->id}}</</td>
                                        <td>{{$order->user_id}}</</td>
                                        <td>{{$order->amount}}</</td>
                                        <td>{{$order->status}}</</td>
                                     
                                    </tr>
                                    @endif
                                    @endforeach  
                                </tbody>
                                <!-- <tboady>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><strong>total {{$sale}}</strong></td>
                                        <td></td>
                                    </tr>
                                </tboady> -->
                            </table>
                        </div>
                    </div>
                </div>
                </hr>
            </div>
            </div>
        </section>        
    </main>
</div>
