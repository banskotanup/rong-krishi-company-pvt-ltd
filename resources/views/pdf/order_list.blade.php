<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #ffffff;
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #e9ecef;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            font-size: 12px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            color: #6c757d;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Order List</h1>
        <p>Exported on: {{ \Carbon\Carbon::now()->format('d M Y, h:i A') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Order Number</th>
                <th>Name</th>
                <th>Country</th>
                <th>City</th>
                <th>State</th>
                <th>Postcode</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Total Amount (NPR)</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                <td>{{ ucfirst($order->country) }}</td>
                <td>{{ ucfirst($order->city) }}</td>
                <td>{{ ucfirst($order->state) }}</td>
                <td>{{ $order->postcode }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ number_format($order->total_amount, 2) }}</td>
                <td>{{ ucfirst($order->payment_method) }}</td>
                <td>
                    @switch($order->status)
                        @case(0)
                            Pending
                            @break
                        @case(1)
                            In Progress
                            @break
                        @case(2)
                            Delivered
                            @break
                        @case(3)
                            Completed
                            @break
                        @case(4)
                            Cancelled
                            @break
                        @default
                            Unknown
                    @endswitch
                </td>
                <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="13" style="text-align: center;">No records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
