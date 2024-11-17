<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <h1>Inventory List</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Purchase Quantity</th>
                <th>Sold Quantity</th>
                <th>Remaining Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventory as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->purchase_quantity }}</td>
                    <td>{{ $product->sold_quantity }}</td>
                    <td>{{ $product->remaining_quantity }}</td>
                    <td>
                        @if ($product->remaining_quantity > 0)
                            <span style="color: green;">Available</span>
                        @else
                            <span style="color: red;">Out of Stock</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
