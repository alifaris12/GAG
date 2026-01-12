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

        .profile-container {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 100;
        }

        .profile-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #9a2222ff 0%, #ff0000ff 100%);
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
            box-shadow: 0 4px 15px rgba(154, 34, 34, 0.3);
            position: relative;
            overflow: hidden;
        }

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

        .profile-btn:hover::before {
            left: 100%;
        }

        .profile-btn:hover {
            background: linear-gradient(135deg, #f7c842 0%, #ffdd6b 100%);
            color: #22529a;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(247, 200, 66, 0.4);
        }

        .profile-btn i {
            font-size: 16px;
            transition: transform 0.3s ease;
        }

        .profile-btn:hover .fa-chevron-down {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 15px);
            right: 0;
            margin-top: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            min-width: 240px;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-15px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -8px;
            right: 20px;
            width: 16px;
            height: 16px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 3px;
            transform: rotate(45deg);
            z-index: -1;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 16px 20px;
            text-align: left;
            background: none;
            border: none;
            color: #333;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dropdown-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: #22529a;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .dropdown-item:hover {
            background: linear-gradient(90deg, rgba(34, 82, 154, 0.08) 0%, rgba(34, 82, 154, 0.02) 100%);
            color: #22529a;
            padding-left: 24px;
        }

        .dropdown-item:hover::before {
            transform: scaleY(1);
        }

        .dropdown-item:active {
            transform: scale(0.98);
        }

        .dropdown-item i {
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #22529a;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover i {
            transform: scale(1.1);
        }

        .dropdown-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.1), transparent);
            margin: 8px 0;
        }

        .dropdown-item.logout {
            color: #dc3545;
        }

        .dropdown-item.logout::before {
            background: #dc3545;
        }

        .dropdown-item.logout:hover {
            background: linear-gradient(90deg, rgba(220, 53, 69, 0.08) 0%, rgba(220, 53, 69, 0.02) 100%);
            color: #c82333;
        }

        .dropdown-item.logout i {
            color: #dc3545;
        }

        .dropdown-item.logout:hover i {
            color: #c82333;
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

        /* TABLET RESPONSIVE */
        @media (max-width: 768px) {
            .header {
                top: 10px;
                left: 10px;
            }

            .logo-image {
                height: 50px;
                max-width: 180px;
            }

            .profile-container {
                top: 10px;
                right: 10px;
            }

            .profile-btn {
                padding: 8px 15px;
                font-size: 13px;
                gap: 6px;
            }

            .profile-btn i {
                font-size: 14px;
            }

            .dropdown-menu {
                min-width: 200px;
                right: -10px;
            }

            .dropdown-item {
                padding: 14px 18px;
                font-size: 13px;
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

        /* MOBILE RESPONSIVE */
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

            .profile-container {
                position: relative;
                top: 0;
                right: 0;
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
                margin-bottom: 10px;
            }

            .profile-btn {
                padding: 10px 20px;
                font-size: 14px;
                justify-content: center;
                width: 100%;
                max-width: 300px;
            }

            .dropdown-menu {
                right: 50%;
                transform: translateX(50%) translateY(-15px) scale(0.95);
                min-width: 90vw;
                max-width: 300px;
            }

            .dropdown-menu.show {
                transform: translateX(50%) translateY(0) scale(1);
            }

            .dropdown-menu::before {
                right: 50%;
                transform: translateX(50%) rotate(45deg);
            }

            .dropdown-item {
                padding: 14px 16px;
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

            .dropdown-menu {
                min-width: 95vw;
            }
        }

        /* LANDSCAPE MODE FOR MOBILE */
        @media (max-height: 600px) and (orientation: landscape) {
            .program-container {
                padding: 80px 20px 20px;
            }

            .mascot {
                width: 60px;
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

    <div class="profile-container">
        <form action="{{ route('logout') }}" method="POST" style="margin: 0; width: 100%;">
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
                <a href="{{ route('lab-ekonomi') }}">
                    <button>Lihat Selengkapnya</button>
                </a>
            </div>
            <div class="program-card">
                <i class="fas fa-building-columns"></i>
                <h3>Laboratorium Ilmu Keuangan Perbankan</h3>
                <a href="{{ route('lab-keuangan-perbankan') }}">
                    <button>Lihat Selengkapnya</button>
                </a>
            </div>
            <div class="program-card">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>Laboratorium Ekonomi Islam</h3>
                <a href="{{ route('lab-ekonomi-islam') }}">
                    <button>Lihat Selengkapnya</button>
                </a>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            const profileBtn = document.querySelector('.profile-btn');
            const chevron = profileBtn.querySelector('.fa-chevron-down');
            
            dropdown.classList.toggle('show');
            
            if (dropdown.classList.contains('show')) {
                chevron.style.transform = 'rotate(180deg)';
            } else {
                chevron.style.transform = 'rotate(0deg)';
            }
        }

        window.onclick = function(event) {
            const dropdown = document.getElementById('dropdownMenu');
            const profileContainer = document.querySelector('.profile-container');
            
            if (dropdown && profileContainer && !profileContainer.contains(event.target)) {
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                    const chevron = document.querySelector('.fa-chevron-down');
                    if (chevron) {
                        chevron.style.transform = 'rotate(0deg)';
                    }
                }
            }
        }

        document.addEventListener('keydown', function(event) {
            const dropdown = document.getElementById('dropdownMenu');
            
            if (event.key === 'Escape' && dropdown) {
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                    const chevron = document.querySelector('.fa-chevron-down');
                    if (chevron) {
                        chevron.style.transform = 'rotate(0deg)';
                    }
                    const profileBtn = document.querySelector('.profile-btn');
                    if (profileBtn) {
                        profileBtn.focus();
                    }
                }
            }
        });

        const dropdownItems = document.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 100);
            });
        });
    </script>
</body>
</html>