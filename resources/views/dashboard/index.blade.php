<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Program - Faculty of Economics and Business</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7c842 0%, #f4a742 50%, #e8941a 100%);
            color: #333;
        }

        .header {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 100;
        }

        .university-logo {
            display: flex;
            align-items: center;
            color: #22529a;
            font-weight: bold;
        }

        .logo-image {
            height: 70px;
            width: auto;
            max-width: 250px;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }

        .logo-image:hover {
            transform: scale(1.05);
        }

        .mascot {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 150px;
            height: auto;
            z-index: 10;
            opacity: 0.9;
            transition: transform 0.3s ease-in-out;
        }

        .mascot:hover {
            transform: scale(1.1);
        }

        .top-right-buttons {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
            display: flex;
            gap: 15px;
        }

        .status-btn,
        .profile-btn {
            padding: 12px 24px;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            text-decoration: none;
        }

        .status-btn {
            background: linear-gradient(135deg, #22529a 0%, #1a3d73 100%);
        }

        .profile-btn {
            background: linear-gradient(135deg, #9a2222ff 0%, #ff0000ff 100%);
        }

        .status-btn::before,
        .profile-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .status-btn:hover::before,
        .profile-btn:hover::before {
            left: 100%;
        }

        .status-btn:hover {
            background: linear-gradient(135deg, #f7c842 0%, #ffdd6b 100%);
            color: #22529a;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(247, 200, 66, 0.4);
        }

        .profile-btn:hover {
            background: linear-gradient(135deg, #f7c842 0%, #ffdd6b 100%);
            color: #22529a;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(247, 200, 66, 0.4);
        }

        .status-btn i,
        .profile-btn i {
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .program-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 80px 20px;
            margin-top: 80px;
            text-align: center;
            flex-grow: 1;
        }

        .program-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #22529a;
            letter-spacing: 2px;
        }

        .program-subtitle {
            font-size: 22px;
            margin-bottom: 40px;
            color: #333;
            font-weight: 700;
            font-style: italic;
        }

        .program-buttons {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .program-card {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 15px;
            width: 250px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .program-card i {
            font-size: 40px;
            color: #22529a;
            margin-bottom: 15px;
        }

        .program-card h3 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .program-card button {
            background-color: #f7c842;
            color: #22529a;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .program-card button:hover {
            background-color: #e8941a;
        }

        @media (max-width: 768px) {
            .top-right-buttons {
                flex-direction: column;
                gap: 10px;
            }

            .status-btn,
            .profile-btn {
                padding: 10px 16px;
                font-size: 14px;
            }

            .program-card {
                width: 200px;
                padding: 20px;
            }

            .program-title {
                font-size: 36px;
            }

            .program-subtitle {
                font-size: 18px;
            }

            .program-buttons {
                gap: 15px;
            }
        }

        @media (max-width: 480px) {
            .program-card {
                width: 150px;
            }

            .program-title {
                font-size: 28px;
            }

            .program-subtitle {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="university-logo">
            <img src="{{ asset('images/FEB-UB-Black-Teks-min 1.png') }}" class="logo-image" alt="University Logo">
        </div>
    </div>

    <img src="{{ asset('images/maskot.png') }}" alt="Maskot" class="mascot">

    <div class="top-right-buttons">
        <a href="{{ route('booking.status') }}" class="status-btn">
            <i class="fas fa-clipboard-list"></i>
            <span>Status Peminjaman</span>
        </a>
        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="profile-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

    <div class="program-container">
        <h2 class="program-title">Peminjaman Laboratorium Fakultas Ekonomi</h2>
        <p class="program-subtitle">Silahkan Pilih Laboratorium Yang Ingin Digunakan</p>
        <div class="program-buttons">
            <div class="program-card">
               <i class="fas fa-chart-line"></i>
                <h3>Laboratorium Ilmu Ekonomi</h3>
                <a href="{{ route('lab-ekonomi-u') }}">
                    <button>Lihat Selengkapnya</button>
                </a>
            </div>
            <div class="program-card">
                <i class="fas fa-building-columns"></i>
                <h3>Laboratorium Ilmu Keuangan Perbankan</h3>
                <a href="{{ route('lab-keuangan-perbankan-u') }}">
                    <button>Lihat Selengkapnya</button>
                </a>
            </div>
            <div class="program-card">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>Laboratorium Ekonomi Islam</h3>
                <a href="{{ route('lab-ekonomi-islam-u') }}">
                    <button>Lihat Selengkapnya</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>