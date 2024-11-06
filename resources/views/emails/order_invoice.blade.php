@component('mail::message')
Hi <b>{{ $order->first_name}}</b>,

<h1>Order Invoice</h1>
<p>Thank you for your order! Below are the details of your purchase.</p>
<ul>
    <li>Order Number: {{ $order->order_number }}</li>
    <li>Date of Purchase: {{ $order->created_at }}</li>
</ul>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->getItem as $item)
        <tr>
            <td>{{$item->getProduct->title}}</td>
            <td>{{$item->getProduct->short_description}}</td>
            <td>{{number_format($item->price, 2)}}</td>
            <td>{{$item->qty}}</td>
            <td>{{number_format($item->price * $item->qty, 2)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Order Summary Section -->
<p style="margin-top: 20px;"><strong>Subtotal:</strong>NPR {{ number_format($order->total_balance, 2)}}</p>
<p><strong>Discount:</strong>NPR {{ number_format($order->discount_amount, 2)}}</p>
<p><strong>Shipping Charge:</strong>NPR {{ number_format($order->shipping_amount, 2)}}</p>
<p><strong>Payment Method:</strong> <span style="text-transform: capitalize; color:#c08f07">{{ $order->payment_method}}</span></p>
<p><strong>Total Amount:</strong>NPR <span style="text-decoration-line: underline; text-decoration-style: double;">{{
        number_format($order->total_amount, 2)}}</span></p>

<p>If you have any questions or need assistance, feel free to <a href="{{url('/contact_us')}}">contact us</a>.</p>
Thanks,<br>
{{config('app.name')}}
@endcomponent