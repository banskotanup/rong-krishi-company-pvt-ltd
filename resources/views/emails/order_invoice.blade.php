@component('mail::message')
<p style="font-size: 20px; ">Hello <b>{{ $order->first_name}}</b>,</p>

<h2 style="font-size: 24px; margin-bottom: 10px; text-align: center; ">Your Order Invoice</h2>
<b>Order Number:</b> {{ $order->order_number }}<br>
<b>Date of Purchase:</b> {{ $order->created_at }}<br>
<b>Status:</b> <span style="color: gray">Pending</span><br>
<p style="text-align: justify;">Your order is currently pending. We'll notify you as soon as it progresses. Thank you
    for your patience!</p>

<p>Below are the details of your purchase.</p>
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
<p><strong>Payment Method:</strong> <span style="text-transform: capitalize; color:#c08f07">{{
        $order->payment_method}}</span></p>
<p><strong>Total Amount:</strong>NPR <span style="text-decoration-line: underline; text-decoration-style: double;">{{
        number_format($order->total_amount, 2)}}</span></p>
<p>Thank you for your order!</p>
<p>If you have any questions or need assistance, feel free to <a href="{{url('/contact_us')}}">contact us</a>.</p>
Thanks,<br>
{{config('app.name')}}
@endcomponent