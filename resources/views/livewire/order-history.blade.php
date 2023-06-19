<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block;
        }
    </style>
    <div class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <h2>Order History</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Address</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->product_price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->subtotal }}</td>
                                <td>{{ $order->address }}</td>
                                
                                <!-- Display more data as needed -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>       
    </div>
</div>
