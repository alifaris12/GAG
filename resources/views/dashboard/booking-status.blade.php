<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Peminjaman - Faculty of Economics and Business</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7c842 0%, #f4a742 50%, #e8941a 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo-image {
            height: 70px;
            width: auto;
            max-width: 250px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .back-btn {
            padding: 12px 24px;
            background: linear-gradient(135deg, #22529a 0%, #1a3d73 100%);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #f7c842 0%, #ffdd6b 100%);
            color: #22529a;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(247, 200, 66, 0.4);
        }

        .page-title {
            text-align: center;
            color: #22529a;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .page-subtitle {
            text-align: center;
            color: #333;
            font-size: 18px;
            margin-bottom: 40px;
        }

        .lab-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .lab-title {
            font-size: 24px;
            color: #22529a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .lab-title i {
            font-size: 28px;
        }

        .no-bookings {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }

        .table-wrapper {
            overflow-x: auto;
            width: 100%;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        .booking-table thead {
            background: #22529a;
            color: white;
        }

        .booking-table th,
        .booking-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;
        }

        .booking-table th:nth-child(4),
        .booking-table td:nth-child(4) {
            white-space: normal;
            min-width: 200px;
        }

        .booking-table tbody tr {
            transition: background 0.3s ease;
        }

        .booking-table tbody tr:hover {
            background: rgba(34, 82, 154, 0.05);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
        }

        .status-pending {
            background: #ffc107;
            color: #856404;
        }

        .status-approved {
            background: #28a745;
            color: white;
        }

        .status-rejected {
            background: #dc3545;
            color: white;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 28px;
            }

            .booking-table {
                font-size: 14px;
            }

            .booking-table th,
            .booking-table td {
                padding: 10px 5px;
            }

            .lab-title {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .booking-table thead {
                display: none;
            }

            .booking-table,
            .booking-table tbody,
            .booking-table tr,
            .booking-table td {
                display: block;
                width: 100%;
            }

            .booking-table tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 10px;
            }

            .booking-table td {
                text-align: right;
                padding: 8px;
                position: relative;
                padding-left: 50%;
            }

            .booking-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/FEB-UB-Black-Teks-min 1.png') }}" class="logo-image" alt="University Logo">
            <a href="{{ route('user.dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Dashboard</span>
            </a>
        </div>

        <h1 class="page-title">Status Peminjaman Laboratorium</h1>
        <p class="page-subtitle">Lihat status peminjaman Anda untuk semua laboratorium</p>

        <!-- Laboratorium Ilmu Ekonomi -->
        <div class="lab-section">
            <h2 class="lab-title">
                <i class="fas fa-chart-line"></i>
                Laboratorium Ilmu Ekonomi
            </h2>
            @if($bookingsEkonomi->count() > 0)
                <div class="table-wrapper">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Booking</th>
                                <th>Waktu</th>
                                <th>Keperluan</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookingsEkonomi as $index => $booking)
                            <tr>
                                <td data-label="No">{{ $index + 1 }}</td>
                                <td data-label="Tanggal Booking">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                                <td data-label="Waktu">{{ $booking->time_slot }}</td>
                                <td data-label="Keperluan">{{ Str::limit($booking->reason, 50) }}</td>
                                <td data-label="Status">
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td data-label="Tanggal Pengajuan">{{ $booking->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="no-bookings">
                    <i class="fas fa-inbox" style="font-size: 48px; color: #ccc; margin-bottom: 10px;"></i>
                    <p>Belum ada peminjaman untuk laboratorium ini</p>
                </div>
            @endif
        </div>

        <!-- Laboratorium Ilmu Keuangan Perbankan -->
        <div class="lab-section">
            <h2 class="lab-title">
                <i class="fas fa-building-columns"></i>
                Laboratorium Ilmu Keuangan Perbankan
            </h2>
            @if($bookingsKeuangan->count() > 0)
                <div class="table-wrapper">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Booking</th>
                                <th>Waktu</th>
                                <th>Keperluan</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookingsKeuangan as $index => $booking)
                            <tr>
                                <td data-label="No">{{ $index + 1 }}</td>
                                <td data-label="Tanggal Booking">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                                <td data-label="Waktu">{{ $booking->time_slot }}</td>
                                <td data-label="Keperluan">{{ Str::limit($booking->reason, 50) }}</td>
                                <td data-label="Status">
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td data-label="Tanggal Pengajuan">{{ $booking->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="no-bookings">
                    <i class="fas fa-inbox" style="font-size: 48px; color: #ccc; margin-bottom: 10px;"></i>
                    <p>Belum ada peminjaman untuk laboratorium ini</p>
                </div>
            @endif
        </div>

        <!-- Laboratorium Ekonomi Islam -->
        <div class="lab-section">
            <h2 class="lab-title">
                <i class="fas fa-hand-holding-usd"></i>
                Laboratorium Ekonomi Islam
            </h2>
            @if($bookingsIslam->count() > 0)
                <div style="overflow-x: auto;">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Booking</th>
                                <th>Waktu</th>
                                <th>Keperluan</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookingsIslam as $index => $booking)
                            <tr>
                                <td data-label="No">{{ $index + 1 }}</td>
                                <td data-label="Tanggal Booking">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                                <td data-label="Waktu">{{ $booking->time_slot }}</td>
                                <td data-label="Keperluan">{{ Str::limit($booking->reason, 50) }}</td>
                                <td data-label="Status">
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td data-label="Tanggal Pengajuan">{{ $booking->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="no-bookings">
                    <i class="fas fa-inbox" style="font-size: 48px; color: #ccc; margin-bottom: 10px;"></i>
                    <p>Belum ada peminjaman untuk laboratorium ini</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>