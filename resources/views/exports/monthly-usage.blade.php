<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Excel-like Table</title>
    <style>
        table {
            border-collapse: collapse; /* Remove table borders */
            width: 100%; /* Adjust table width as needed */
        }
        th, td {
            border: 1px solid #ddd; /* Add borders to cells */
            padding: 8px; /* Add padding for spacing */
        }
        th {
            text-align: left; /* Align headers to left */
            background-color: #f2f2f2; /* Light background for headers */
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Month</th>
                <th>Car Type</th>
                <th>Borrower</th>
                <th>Purpose</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <tr>
                <td>{{$permission->created_at->format('F Y')}}</td>
                <td>{{$permission->vehicle->name}}</td>
                <td>{{$permission->user->name}}</td>
                <td>{{$permission->reason}}</td>
            </tr>
            @endforeach
            </tbody>
    </table>
</body>
</html>
