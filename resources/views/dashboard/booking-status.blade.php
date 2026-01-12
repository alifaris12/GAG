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
            gap: 15px;
        }

        .logo-image {
            height: 60px;
            width: auto;
            max-width: 220px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }

        .logo-image:hover {
            transform: scale(1.05);
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
            box-shadow: 0 4px 15px rgba(34, 82, 154, 0.3);
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
            font-size: clamp(28px, 5vw, 36px);
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .page-subtitle {
            text-align: center;
            color: #333;
            font-size: clamp(14px, 3vw, 18px);
            margin-bottom: 35px;
            font-weight: 500;
        }

        .lab-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .lab-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .lab-title {
            font-size: clamp(20px, 4vw, 24px);
            color: #22529a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .lab-title i {
            font-size: clamp(24px, 5vw, 28px);
        }

        .no-bookings {
            text-align: center;
            padding: 40px 20px;
            color: #666;
            font-style: italic;
        }

        .no-bookings i {
            font-size: clamp(36px, 8vw, 48px);
            color: #ccc;
            margin-bottom: 10px;
            display: block;
        }

        .table-wrapper {
            overflow-x: auto;
            width: 100%;
            -webkit-overflow-scrolling: touch;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
            min-width: 600px;
        }

        .booking-table thead {
            background: #22529a;
            color: white;
        }

        .booking-table th,
        .booking-table td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;
        }

        .booking-table th:nth-child(4),
        .booking-table td:nth-child(4) {
            white-space: normal;
            min-width: 200px;
            max-width: 300px;
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
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
            white-space: nowrap;
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

        /* TABLET RESPONSIVE */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .header {
                gap: 12px;
            }

            .logo-image {
                height: 50px;
                max-width: 180px;
            }

            .back-btn {
                padding: 10px 20px;
                font-size: 14px;
                gap: 8px;
            }

            .page-subtitle {
                margin-bottom: 25px;
            }

            .lab-section {
                padding: 20px;
                margin-bottom: 20px;
            }

            .booking-table {
                font-size: 14px;
                min-width: 550px;
            }

            .booking-table th,
            .booking-table td {
                padding: 12px 8px;
            }

            .booking-table th:nth-child(4),
            .booking-table td:nth-child(4) {
                min-width: 150px;
            }
        }

        /* MOBILE RESPONSIVE */
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .logo-image {
                height: 45px;
                max-width: 160px;
            }

            .back-btn {
                padding: 10px 18px;
                font-size: 14px;
                width: 100%;
                justify-content: center;
            }

            .page-title {
                margin-bottom: 8px;
            }

            .page-subtitle {
                margin-bottom: 20px;
            }

            .lab-section {
                padding: 18px 15px;
                margin-bottom: 18px;
                border-radius: 12px;
            }

            .lab-title {
                margin-bottom: 15px;
            }

            .no-bookings {
                padding: 30px 15px;
            }

            /* CARD LAYOUT FOR MOBILE */
            .table-wrapper {
                overflow-x: visible;
            }

            .booking-table {
                min-width: auto;
            }

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
                border-radius: 10px;
                padding: 15px;
                background: white;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .booking-table tr:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            .booking-table td {
                text-align: right;
                padding: 10px 0;
                position: relative;
                padding-left: 50%;
                border-bottom: 1px solid #f0f0f0;
                white-space: normal;
            }

            .booking-table td:last-child {
                border-bottom: none;
            }

            .booking-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                font-weight: 600;
                text-align: left;
                color: #22529a;
                font-size: 13px;
            }

            .booking-table td:nth-child(4) {
                min-width: auto;
                max-width: none;
            }

            .status-badge {
                font-size: 10px;
                padding: 5px 10px;
            }
        }

        /* EXTRA SMALL DEVICES */
        @media (max-width: 360px) {
            body {
                padding: 8px;
            }

            .back-btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            .lab-section {
                padding: 15px 12px;
            }

            .booking-table tr {
                padding: 12px;
            }

            .booking-table td {
                padding: 8px 0;
                font-size: 13px;
            }

            .booking-table td::before {
                font-size: 12px;
            }
        }

        /* SCROLLBAR STYLING */
        .table-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .table-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #22529a;
            border-radius: 10px;
        }

        .table-wrapper::-webkit-scrollbar-thumb:hover {
            background: #1a3d73;
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
                <span>Laboratorium Ilmu Ekonomi</span>
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
                    <i class="fas fa-inbox"></i>
                    <p>Belum ada peminjaman untuk laboratorium ini</p>
                </div>
            @endif
        </div>

        <!-- Laboratorium Ilmu Keuangan Perbankan -->
        <div class="lab-section">
            <h2 class="lab-title">
                <i class="fas fa-building-columns"></i>
                <span>Laboratorium Ilmu Keuangan Perbankan</span>
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
                    <i class="fas fa-inbox"></i>
                    <p>Belum ada peminjaman untuk laboratorium ini</p>
                </div>
            @endif
        </div>

        <!-- Laboratorium Ekonomi Islam -->
        <div class="lab-section">
            <h2 class="lab-title">
                <i class="fas fa-hand-holding-usd"></i>
                <span>Laboratorium Ekonomi Islam</span>
            </h2>
            @if($bookingsIslam->count() > 0)
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
                    <i class="fas fa-inbox"></i>
                    <p>Belum ada peminjaman untuk laboratorium ini</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>