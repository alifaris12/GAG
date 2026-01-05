<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Lab Ilmu Ekonomi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #34495e;
            margin-bottom: 30px;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .booking-table th, .booking-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .booking-table th {
            background-color: #f7c842;
            color: white;
        }

        .button {
            padding: 8px 16px;
            margin: 5px;
            background-color: #f7c842;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #e8941a;
        }

        .button:active {
            background-color: #d8861a;
        }

        .status-pending {
            color: #f7c842;
            font-weight: bold;
        }

        .status-approved {
            color: green;
            font-weight: bold;
        }

        .status-rejected {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Booking Requests - Laboratorium Ilmu Ekonomi</h2>
    
    <table class="booking-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>NIM</th>
                <th>Reason</th>
                <th>Time Slot</th>
                <th>Booking Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->nim }}</td>
                    <td>{{ $booking->reason }}</td>
                    <td>{{ $booking->time_slot }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td class="status-pending">{{ ucfirst($booking->status) }}</td>
                    <td>
                        <!-- Approve Button -->
                        <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="button">Approve</button>
                        </form>
                        
                        <!-- Reject Button -->
                        <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="button" style="background-color: #e94f4f;">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
