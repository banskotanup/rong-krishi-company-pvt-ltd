@component('mail::message')
<p style="font-size: 20px; ">Hello <b>{{ $order->first_name}}</b>,</p>
<h2 style="font-size: 24px; margin-bottom: 10px; text-align: center; ">Your Order Status Update</h2>



<div style="padding: 10px; border-radius: 4px; font-weight: bold; background-color: [STATUS_COLOR];">
    <p style="font-size: 18px; margin: 0;">
        @if ($order->status == 0)
    <p style="font-size: 16px;">Your order is currently pending. We'll notify you as soon as it progresses. Thank you
        for your patience!</p>
    <b>Order Number:</b> {{ $order->order_number }}<br>
    <b>Date of Purchase:</b> {{ $order->created_at }}<br>
    <b>Status:</b> <span style="color: gray">Pending</span>
    @endif
    @if ($order->status == 1)
    <p style="font-size: 16px;">Your order is currently being processed and is in progress. We’ll update you once it’s
        ready for delivery. Thanks for your patience!</p>
    <b>Order Number:</b> {{ $order->order_number }}<br>
    <b>Date of Purchase:</b> {{ $order->created_at }}<br>
    <b>Status:</b> <span style="color: blue">Inprogress</span>
    @endif
    @if ($order->status == 2)
    <p style="font-size: 16px;">We're happy to inform you that your order has been successfully delivered! If you have
        any questions or need further assistance, feel free to reach out. Enjoy your purchase!</p>
    <b>Order Number:</b> {{ $order->order_number }}<br>
    <b>Date of Purchase:</b> {{ $order->created_at }}<br>
    <b>Status:</b> <span style="color: teal">Delievred</span>
    @endif
    @if ($order->status == 3)
    <p style="font-size: 16px;">Your order has been successfully completed. Thank you for choosing us! If you need any
        assistance, don’t hesitate to contact us.</p>
    <b>Order Number:</b> {{ $order->order_number }}<br>
    <b>Date of Purchase:</b> {{ $order->created_at }}<br>
    <b>Status:</b> <span style="color: rgb(8, 165, 8)">Completed</span>
    @endif
    @if ($order->status == 4)
    <p style="font-size: 16px;">We're sorry to inform you that your order has been cancelled. If you have any questions
        or need assistance, please contact us. We hope to serve you again soon.</p>
    <b>Order Number:</b> {{ $order->order_number }}<br>
    <b>Date of Purchase:</b> {{ $order->created_at }}<br>
    <b>Status:</b> <span style="color: #D0342C">Cancelled</span>
    @endif
    </p>
</div>
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

<div>
    <p style="margin-top: 20px;"><strong>Subtotal:</strong>NPR {{ number_format($order->total_balance, 2)}}</p>
    <p><strong>Discount:</strong>NPR {{ number_format($order->discount_amount, 2)}}</p>
    <p><strong>Shipping Charge:</strong>NPR {{ number_format($order->shipping_amount, 2)}}</p>
    <p><strong>Payment Method:</strong> <span style="text-transform: capitalize; color:#c08f07">{{
            $order->payment_method}}</span></p>
    <p><strong>Total Amount:</strong>NPR <span
            style="text-decoration-line: underline; text-decoration-style: double;">{{
            number_format($order->total_amount, 2)}}</span></p>
</div>

<p style="font-size: 16px; margin-top: 20px;">If you have any questions or need further assistance, feel free to <a
        href="{{url('/contact_us')}}">contact us</a>.</p>

<p style="font-size: 16px; margin-top: 10px;">Thank you for your order!</p>

<div style="font-size: 14px; color: #666; text-align: center; margin-top: 20px;">
    <p style="margin: 0;">Best regards,</p>
    <p style="margin: 0;">{{config('app.name')}}</p>
</div>

@endcomponent