<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f9fa;
            border-bottom: 2px solid #007bff;
        }
        .header h1 {
            margin: 0;
            color: #007bff;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #6c757d;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
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
        td {
            font-size: 12px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin List</h1>
        <p>Generated on: {{ \Carbon\Carbon::now()->format('d M Y, h:i A') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($admins as $index => $admin)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $admin->user_number }}</td>
                <td>{{ $admin->name }} {{ $admin->last_name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->phone }}</td>
                <td>{{ ucfirst($admin->country) }}</td>
                <td>{{ $admin->address }} {{ $admin->address_two }}</td>
                <td>{{ $admin->status == 0 ? 'Active' : 'Inactive' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center;">No records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
