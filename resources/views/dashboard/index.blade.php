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
            overflow-x: hidden;
            overflow-y: auto;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7c842 0%, #f4a742 50%, #e8941a 100%);
            color: #333;
            min-height: 100vh;
            position: relative;
        }

        .header {
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 100;
        }

        .university-logo {
            display: flex;
            align-items: center;
            color: #22529a;
            font-weight: bold;
        }

        .logo-image {
            height: 60px;
            width: auto;
            max-width: 200px;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }

        .logo-image:hover {
            transform: scale(1.05);
        }

        .mascot {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 120px;
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
            top: 15px;
            right: 15px;
            z-index: 100;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .status-btn,
        .profile-btn {
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
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
            font-size: 16px;
            transition: transform 0.3s ease;
        }

        .program-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 100px 20px 40px;
            min-height: 100vh;
            text-align: center;
        }

        .program-title {
            font-size: clamp(24px, 5vw, 48px);
            font-weight: 700;
            margin-bottom: 15px;
            color: #22529a;
            letter-spacing: 1px;
            line-height: 1.2;
            padding: 0 10px;
        }

        .program-subtitle {
            font-size: clamp(16px, 3vw, 22px);
            margin-bottom: 30px;
            color: #333;
            font-weight: 700;
            font-style: italic;
            padding: 0 10px;
        }

        .program-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 280px));
            gap: 25px;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
            padding: 0 10px;
        }

        .program-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 25px 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .program-card i {
            font-size: 38px;
            color: #22529a;
            margin-bottom: 15px;
        }

        .program-card h3 {
            font-size: clamp(16px, 2.5vw, 20px);
            margin-bottom: 15px;
            line-height: 1.3;
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .program-card button {
            background-color: #f7c842;
            color: #22529a;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .program-card button:hover {
            background-color: #e8941a;
        }

        /* TABLET RESPONSIVENESS */
        @media (max-width: 768px) {
            .header {
                top: 10px;
                left: 10px;
            }

            .logo-image {
                height: 50px;
                max-width: 180px;
            }

            .top-right-buttons {
                top: 10px;
                right: 10px;
                gap: 8px;
            }

            .status-btn,
            .profile-btn {
                padding: 8px 15px;
                font-size: 13px;
                gap: 6px;
            }

            .status-btn i,
            .profile-btn i {
                font-size: 14px;
            }

            .mascot {
                width: 100px;
                bottom: 15px;
                right: 15px;
            }

            .program-container {
                padding: 80px 15px 30px;
            }

            .program-buttons {
                grid-template-columns: repeat(auto-fit, minmax(200px, 250px));
                gap: 20px;
            }

            .program-card {
                padding: 20px 15px;
            }

            .program-card i {
                font-size: 32px;
            }
        }

        /* MOBILE RESPONSIVENESS */
        @media (max-width: 480px) {
            .header {
                position: relative;
                top: 0;
                left: 0;
                padding: 10px;
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .logo-image {
                height: 40px;
                max-width: 150px;
            }

            .top-right-buttons {
                position: relative;
                top: 0;
                right: 0;
                width: 100%;
                padding: 10px;
                justify-content: center;
                gap: 10px;
                margin-bottom: 10px;
            }

            .status-btn,
            .profile-btn {
                padding: 10px 16px;
                font-size: 13px;
                flex: 1;
                justify-content: center;
                max-width: 180px;
            }

            .status-btn span,
            .profile-btn span {
                display: none;
            }

            .status-btn i,
            .profile-btn i {
                font-size: 18px;
                margin: 0;
            }

            .status-btn::after {
                content: 'Status';
                margin-left: 6px;
            }

            .profile-btn::after {
                content: 'Logout';
                margin-left: 6px;
            }

            .mascot {
                width: 70px;
                bottom: 10px;
                right: 10px;
            }

            .program-container {
                padding: 20px 10px 30px;
                min-height: calc(100vh - 120px);
            }

            .program-title {
                margin-bottom: 12px;
                letter-spacing: 0.5px;
            }

            .program-subtitle {
                margin-bottom: 25px;
            }

            .program-buttons {
                grid-template-columns: 1fr;
                gap: 15px;
                max-width: 320px;
            }

            .program-card {
                padding: 20px 15px;
            }

            .program-card i {
                font-size: 30px;
                margin-bottom: 10px;
            }

            .program-card h3 {
                min-height: auto;
                margin-bottom: 12px;
            }

            .program-card button {
                padding: 12px 20px;
                font-size: 14px;
            }
        }

        /* EXTRA SMALL DEVICES */
        @media (max-width: 360px) {
            .program-buttons {
                max-width: 280px;
            }

            .program-card {
                padding: 18px 12px;
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