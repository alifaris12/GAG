<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelola Booking Lab Keuangan Perbankan - Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .main-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .header-title {
            color: #22529a;
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-title i {
            font-size: 2.5rem;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .filter-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .filter-btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: 2px solid #22529a;
            background: white;
            color: #22529a;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-family: 'Poppins', sans-serif;
        }

        .filter-btn:hover {
            background: #22529a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(34, 82, 154, 0.3);
        }

        .filter-btn.active {
            background: #22529a;
            color: white;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }

        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
        }

        .custom-table thead {
            background: linear-gradient(135deg, #22529a 0%, #1a3d73 100%);
            color: white;
        }

        .custom-table thead th {
            padding: 15px;
            font-weight: 600;
            text-align: left;
            font-size: 0.9rem;
            border: none;
        }

        .custom-table thead th:first-child {
            border-top-left-radius: 10px;
        }

        .custom-table thead th:last-child {
            border-top-right-radius: 10px;
        }

        .custom-table tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.3s ease;
        }

        .custom-table tbody tr:hover {
            background: #fff8e8;
            transform: scale(1.01);
            box-shadow: 0 2px 10px rgba(247, 200, 66, 0.2);
        }

        .custom-table tbody td {
            padding: 15px;
            vertical-align: middle;
            font-size: 0.9rem;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-pending {
            background: #ffc107;
            color: #856404;
        }

        .badge-approved {
            background: #28a745;
            color: white;
        }

        .badge-rejected {
            background: #dc3545;
            color: white;
        }

        .badge-time {
            background: #22529a;
            color: white;
        }

        .action-btn {
            padding: 8px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            margin: 0 2px;
        }

        .btn-approve {
            background: #28a745;
            color: white;
        }

        .btn-approve:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        }

        .btn-reject {
            background: #dc3545;
            color: white;
        }

        .btn-reject:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
        }

        .btn-delete {
            background: #6c757d;
            color: white;
        }

        .btn-delete:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(108, 117, 125, 0.3);
        }

        .whatsapp-link {
            color: #25D366;
            text-decoration: none;
            font-weight: 500;
        }

        .whatsapp-link:hover {
            text-decoration: underline;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 4rem;
            color: #ccc;
            margin-bottom: 20px;
        }

        .empty-state p {
            color: #999;
            font-size: 1.1rem;
        }

        .pagination {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .page-link {
            padding: 8px 15px;
            border-radius: 6px;
            border: 1px solid #dee2e6;
            color: #22529a;
            text-decoration: none;
            font-weight: 600;
        }

        .page-link:hover {
            background: #22529a;
            color: white;
            border-color: #22529a;
        }

        .page-item.active .page-link {
            background: #22529a;
            border-color: #22529a;
            color: white;
        }

        .back-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #22529a 0%, #1a3d73 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #f7c842 0%, #ffdd6b 100%);
            color: #22529a;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(247, 200, 66, 0.4);
        }

        /* MOBILE RESPONSIVE */
        @media (max-width: 768px) {
            body {
                padding: 12px;
            }

            .back-btn {
                width: 100%;
                justify-content: center;
                margin-bottom: 15px;
            }

            .header-card {
                padding: 18px;
                margin-bottom: 18px;
            }

            .header-title {
                gap: 10px;
            }

            .content-card {
                padding: 18px;
            }

            .alert {
                padding: 12px 16px;
            }

            .filter-buttons {
                gap: 8px;
            }

            .filter-btn {
                flex: 1 1 calc(50% - 4px);
                min-width: 140px;
                justify-content: center;
                padding: 10px 12px;
            }

            .custom-table {
                min-width: 650px;
                font-size: 0.8rem;
            }

            .custom-table thead th,
            .custom-table tbody td {
                padding: 10px 6px;
            }

            .action-btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }

            .badge {
                padding: 5px 10px;
            }

            .header-title {
                font-size: 2rem;
            }
        }

        /* MOBILE SMALL */
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .header-title {
                font-size: 1.5rem;
            }

            .back-btn {
                padding: 10px 16px;
                font-size: 0.9rem;
            }

            .header-card,
            .content-card {
                padding: 15px;
                margin-bottom: 15px;
                border-radius: 12px;
            }

            .filter-buttons {
                flex-direction: column;
                gap: 8px;
            }

            .filter-btn {
                width: 100%;
                flex: 1 1 100%;
                min-width: auto;
            }

            .custom-table {
                min-width: 600px;
            }

            .custom-table thead th {
                font-size: 0.75rem;
                padding: 8px 5px;
            }

            .custom-table tbody td {
                font-size: 0.75rem;
                padding: 8px 5px;
            }

            .action-btn {
                padding: 6px 8px;
                margin: 1px;
            }

            .action-btn i {
                font-size: 0.8rem;
            }

            .empty-state {
                padding: 40px 15px;
            }

            .pagination {
                gap: 3px;
            }

            .page-link {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
        }

        /* EXTRA SMALL DEVICES */
        @media (max-width: 360px) {
            body {
                padding: 8px;
            }

            .header-title {
                font-size: 1rem;
            }

            .header-card,
            .content-card {
                padding: 12px;
            }

            .custom-table {
                min-width: 550px;
            }

            .custom-table thead th,
            .custom-table tbody td {
                padding: 6px 4px;
                font-size: 0.7rem;
            }

            .badge {
                font-size: 0.65rem;
                padding: 4px 8px;
            }

            .action-btn {
                padding: 5px 6px;
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

        /* LANDSCAPE MODE */
        @media (max-height: 600px) and (orientation: landscape) {
            .header-card {
                padding: 15px;
                margin-bottom: 15px;
            }

            .content-card {
                padding: 15px;
            }

            .empty-state {
                padding: 30px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Back Button -->
        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Dashboard</span>
        </a>

        <!-- Header -->
        <div class="header-card">
            <h1 class="header-title">
                <i class="fas fa-building-columns"></i>
                Kelola Booking Laboratorium Keuangan & Perbankan
            </h1>
        </div>

        <!-- Content -->
        <div class="content-card">
            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Filter Buttons -->
            <div class="filter-buttons">
                <a href="{{ route('lab-keuangan-perbankan') }}" class="filter-btn {{ !request('status') ? 'active' : '' }}">
                    <i class="fas fa-list"></i> Semua ({{ App\Models\BookingLaboratoriumIlmuKeuanganPerbankan::count() }})
                </a>
                <a href="{{ route('lab-keuangan-perbankan', ['status' => 'pending']) }}" class="filter-btn {{ request('status') === 'pending' ? 'active' : '' }}">
                    <i class="fas fa-clock"></i> Pending
                </a>
                <a href="{{ route('lab-keuangan-perbankan', ['status' => 'approved']) }}" class="filter-btn {{ request('status') === 'approved' ? 'active' : '' }}">
                    <i class="fas fa-check"></i> Approved
                </a>
                <a href="{{ route('lab-keuangan-perbankan', ['status' => 'rejected']) }}" class="filter-btn {{ request('status') === 'rejected' ? 'active' : '' }}">
                    <i class="fas fa-times"></i> Rejected
                </a>
            </div>

            <!-- Table -->
            <div class="table-wrapper">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>WhatsApp</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $index => $booking)
                        <tr>
                            <td><strong>{{ $bookings->firstItem() + $index }}</strong></td>
                            <td><strong>{{ $booking->name }}</strong></td>
                            <td>{{ $booking->nim }}</td>
                            <td>
                                <a href="https://wa.me/{{ $booking->whatsapp }}" target="_blank" class="whatsapp-link">
                                    <i class="fab fa-whatsapp"></i> {{ $booking->whatsapp }}
                                </a>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                            <td>
                                <span class="badge badge-time">{{ $booking->time_slot }}</span>
                            </td>
                            <td>
                                <small>{{ Str::limit($booking->reason, 50) }}</small>
                            </td>
                            <td>
                                @if($booking->status === 'pending')
                                    <span class="badge badge-pending"><i class="fas fa-clock"></i> Pending</span>
                                @elseif($booking->status === 'approved')
                                    <span class="badge badge-approved"><i class="fas fa-check"></i> Approved</span>
                                @else
                                    <span class="badge badge-rejected"><i class="fas fa-times"></i> Rejected</span>
                                @endif
                            </td>
                            <td>
                                <div style="display: flex; gap: 5px;">
                                    @if($booking->status === 'pending')
                                        <!-- Approve Button -->
                                        <form action="{{ route('lab-keuangan-perbankan.approve', $booking->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="action-btn btn-approve" title="Approve">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>

                                        <!-- Reject Button -->
                                        <form action="{{ route('lab-keuangan-perbankan.reject', $booking->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="action-btn btn-reject" title="Reject">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Delete Button -->
                                    <form action="{{ route('lab-keuangan-perbankan.destroy', $booking->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn btn-delete" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                <div class="empty-state">
                                    <i class="fas fa-inbox"></i>
                                    <p>Belum ada data booking</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($bookings->hasPages())
            <div class="pagination">
                {{ $bookings->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>