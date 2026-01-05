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

        .profile-container {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }

        .profile-btn {
            padding: 12px 24px;
            background: linear-gradient(135deg, #9a2222ff 0%, #ff0000ff 100%);
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
            box-shadow: 0 4px 15px rgba(34, 82, 154, 0.2);
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
            font-size: 18px;
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

            .profile-btn {
                padding: 10px 16px;
                font-size: 14px;
            }

            .dropdown-menu {
                min-width: 200px;
                right: -10px;
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

    <div class="profile-container">
    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
        @csrf
        <button type="submit" class="profile-btn">
            <i class="fas fa-sign-out-alt"></i> <!-- Ikon logout -->
            <span>Logout</span> <!-- Teks logout -->
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
                <a href="{{ route('Lab-keuangan-perbangkan') }}">
                    <button>Lihat Selengkapnya</button>
                </a>
            </div>
            <!-- Kotak baru untuk Lab Ekonomi Islam -->
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
            
            if (!profileContainer.contains(event.target)) {
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                    const chevron = document.querySelector('.fa-chevron-down');
                    chevron.style.transform = 'rotate(0deg)';
                }
            }
        }

        document.addEventListener('keydown', function(event) {
            const dropdown = document.getElementById('dropdownMenu');
            
            if (event.key === 'Escape') {
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                    const chevron = document.querySelector('.fa-chevron-down');
                    chevron.style.transform = 'rotate(0deg)';
                    document.querySelector('.profile-btn').focus();
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
