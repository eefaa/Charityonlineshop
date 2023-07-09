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
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Subtotal</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Tracking No</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <ul>
                                        @foreach($order->order_items as $item)
                                        <li>{{ $item->product->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                            @foreach($order->order_items as $item)
                                            <li>x{{ $item->quantity}}</li>
                                            @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                            @foreach($order->order_items as $item)
                                            <li>RM{{ number_format($item->product->oriPrice, 2)  }}</li>
                                            @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                            @foreach($order->order_items as $item)
                                            <li>RM{{ number_format($item->product->oriPrice * $item->quantity, 2)  }}</li>
                                            @endforeach
                                    </ul>
                                </td>
                                <td>RM{{ $order->subtotal }}</td>
                                <td>{{ $order->user->address }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->tracking_no }}</td>
                                <!-- Display more data as needed -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>       
    </div>
</div>
