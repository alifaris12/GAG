<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laboratorium Ilmu Ekonomi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: auto;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7c842 0%, #f4a742 50%, #e8941a 100%);
            color: #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>');
            pointer-events: none;
        }

        .container {
            width: 100%;
            max-width: 450px;
            display: flex;
            flex-direction: column;
            gap: 25px;
            position: relative;
            z-index: 1;
        }

        .calendar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 0;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: slideIn 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .calendar-top-section {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            padding: 30px 35px;
            position: relative;
            overflow: hidden;
        }

        .calendar-top-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: headerShine 3s ease-in-out infinite;
        }

        @keyframes headerShine {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(10%, 10%); }
        }

        .calendar-top-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #f7c842, #e8941a, #f7c842);
            background-size: 200% 100%;
            animation: gradientSlide 3s ease infinite;
        }

        @keyframes gradientSlide {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .back-button-top {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            color: white;
            padding: 10px 18px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            cursor: pointer;
            font-size: 0.9em;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }

        .back-button-top:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateX(-3px);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .back-button-top:active {
            transform: translateX(0);
        }

        .header-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .header-icon {
            font-size: 2.5em;
            margin-bottom: 10px;
            opacity: 0.9;
        }

        .header-title {
            font-size: 1.8em;
            font-weight: 700;
            color: white;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }

        .header-subtitle {
            font-size: 0.75em;
            opacity: 0.85;
            font-weight: 500;
            letter-spacing: 3px;
            color: rgba(255, 255, 255, 0.9);
        }

        .calendar-content {
            padding: 35px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .calendar-header h2 {
            font-size: 1.5em;
            background: linear-gradient(135deg, #f7c842, #e8941a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            cursor: pointer;
            user-select: none;
            transition: all 0.3s;
            font-weight: 700;
        }

        .calendar-header h2:hover {
            transform: scale(1.05);
        }

        .nav-button {
            background: linear-gradient(135deg, #f7c842, #e8941a);
            color: white;
            padding: 10px 14px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 1em;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(247, 200, 66, 0.3);
        }

        .nav-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(247, 200, 66, 0.4);
        }

        .nav-button:active {
            transform: translateY(0);
        }

        .weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            margin-bottom: 12px;
        }

        .weekday {
            text-align: center;
            font-weight: 600;
            color: #e8941a;
            font-size: 0.85em;
            padding: 10px 0;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }

        .day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #007bff;
            color: #fff;
            border-radius: 14px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 0.95em;
            position: relative;
            overflow: hidden;
        }

        .day::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.5s, height 0.5s;
        }

        .day:hover::before {
            width: 100%;
            height: 100%;
        }

        .day:hover {
            background: #0056b3;
            transform: scale(1.1) rotate(3deg);
            box-shadow: 0 8px 25px rgba(0, 86, 179, 0.4);
        }

        .day.selected {
            background: #0056b3;
            box-shadow: 0 0 0 3px rgba(0, 86, 179, 0.3);
            transform: scale(1.05);
        }

        .day.today {
            box-shadow: 0 0 0 3px #ffd700;
        }

        .empty-day {
            aspect-ratio: 1;
        }

        .disabled {
            background-color: #dcdcdc;
            pointer-events: none;
            cursor: not-allowed;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 35px;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .back-button {
            background: linear-gradient(135deg, #f7c842, #e8941a);
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 0.95em;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(247, 200, 66, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(247, 200, 66, 0.4);
        }

        .back-button:active {
            transform: translateY(0);
        }

        .form-container h3 {
            background: linear-gradient(135deg, #f7c842, #e8941a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            font-size: 1.4em;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #e8941a;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 0.95em;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px;
            font-size: 1em;
            border-radius: 12px;
            border: 2px solid #e8e8e8;
            outline: none;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #f7c842;
            box-shadow: 0 0 0 3px rgba(247, 200, 66, 0.1);
            transform: translateY(-2px);
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group select option:disabled {
            color: #999;
            background: #f5f5f5;
        }

        .booking-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #f7c842, #e8941a);
            color: white;
            font-size: 1.1em;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 8px 25px rgba(247, 200, 66, 0.3);
            position: relative;
            overflow: hidden;
        }

        .booking-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .booking-button:hover::before {
            width: 300px;
            height: 300px;
        }

        .booking-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(247, 200, 66, 0.4);
        }

        .booking-button:active {
            transform: translateY(-1px);
        }

        .booking-button:disabled {
            background: linear-gradient(135deg, #ccc, #aaa);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .confirmation {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: bounceIn 0.6s ease-out;
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .confirmation i {
            font-size: 4em;
            color: #4caf50;
            margin-bottom: 20px;
            animation: checkmark 0.8s ease-out;
        }

        @keyframes checkmark {
            0%, 50% {
                transform: scale(0) rotate(0deg);
            }
            100% {
                transform: scale(1) rotate(360deg);
            }
        }

        .confirmation h3 {
            color: #333;
            font-size: 1.8em;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .confirmation p {
            color: #666;
            font-size: 1.1em;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .confirmation button {
            margin-top: 25px;
            padding: 14px 30px;
            background: linear-gradient(135deg, #f7c842, #e8941a);
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 6px 20px rgba(247, 200, 66, 0.3);
        }

        .confirmation button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(247, 200, 66, 0.4);
        }

        .selected-date-badge {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 600;
            margin-bottom: 20px;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        @media (max-width: 480px) {
            .calendar-content, .form-container, .confirmation {
                padding: 25px;
            }
            
            .calendar-header h2 {
                font-size: 1.3em;
            }

            .header-title {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="calendar">
            <div class="calendar-top-section">
                <button class="back-button-top" onclick="window.history.back()">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>
                <div class="header-content">
                    <div class="header-icon">🏛️</div>
                    <div class="header-title">Laboratorium Ilmu Ekonomi</div>
                </div>
            </div>

            <div class="calendar-content">
                <div class="calendar-header">
                    <button class="nav-button" onclick="previousMonth()"><i class="fas fa-chevron-left"></i></button>
                    <h2 id="calendarHeader">December 2025</h2>
                    <button class="nav-button" onclick="nextMonth()"><i class="fas fa-chevron-right"></i></button>
                </div>

                <div class="weekdays">
                    <div class="weekday">Min</div>
                    <div class="weekday">Sen</div>
                    <div class="weekday">Sel</div>
                    <div class="weekday">Rab</div>
                    <div class="weekday">Kam</div>
                    <div class="weekday">Jum</div>
                    <div class="weekday">Sab</div>
                </div>

                <div class="days" id="calendarDays"></div>
            </div>
        </div>

        <div class="form-container" id="formContainer" style="display: none;">
            <div class="form-header">
                <h3>Formulir Peminjaman</h3>
                <button class="back-button" onclick="backToCalendar()">
                    <i class="fas fa-arrow-left"></i> Kembali Ke kalender
                </button>
            </div>
            <div class="selected-date-badge" id="selectedDateBadge"></div>
            <form id="bookingForm">
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Nama</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label for="nim"><i class="fas fa-id-card"></i> NIM</label>
                    <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
                </div>
                <div class="form-group">
                    <label for="wa"><i class="fab fa-whatsapp"></i> Nomor WhatsApp</label>
                    <input type="tel" id="wa" name="wa" placeholder="08xxxxxxxxxx" required>
                </div>
                <div class="form-group">
                    <label for="reason"><i class="fas fa-comment-alt"></i> Alasan Peminjaman</label>
                    <textarea id="reason" name="reason" placeholder="Jelaskan keperluan peminjaman..." rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="timeSlot"><i class="fas fa-clock"></i> Pilih Jam</label>
                    <select id="timeSlot" name="timeSlot" required>
                        <option value="">-- Pilih Waktu --</option>
                        <option value="07:00 - 10:00">07:00 - 10:00</option>
                        <option value="11:00 - 14:00">11:00 - 14:00</option>
                        <option value="15:00 - 18:00">15:00 - 18:00</option>
                    </select>
                </div>
                <button type="submit" class="booking-button" id="submitBtn">
                    <i class="fas fa-paper-plane"></i> Kirim Permohonan
                </button>
            </form>
        </div>

        <div class="confirmation" id="confirmation" style="display: none;">
            <i class="fas fa-check-circle"></i>
            <h3>Booking Berhasil!</h3>
            <p id="confirmDate"></p>
            <p id="confirmTime"></p>
            <p id="confirmName"></p>
            <button onclick="resetBooking()"><i class="fas fa-redo"></i> Buat Booking Lain</button>
        </div>
    </div>

    <script>
        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();
        let selectedDate = null;
        let selectedDay = null;
        let bookedSlots = [];

        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        function generateCalendar() {
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const today = new Date();
            
            document.getElementById("calendarHeader").textContent = `${months[currentMonth]} ${currentYear}`;

            const calendarDays = document.getElementById("calendarDays");
            calendarDays.innerHTML = '';

            for (let i = 0; i < firstDay; i++) {
                const emptyDiv = document.createElement("div");
                emptyDiv.classList.add("empty-day");
                calendarDays.appendChild(emptyDiv);
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const dayDiv = document.createElement("div");
                dayDiv.classList.add("day");
                dayDiv.textContent = day;
                
                const dayDate = new Date(currentYear, currentMonth, day);
                const isToday = today.toDateString() === dayDate.toDateString();
                const isPast = dayDate < today;
                
                if (isToday) {
                    dayDiv.classList.add("today");
                }

                if (isPast) {
                    dayDiv.classList.add("disabled");
                }

                dayDiv.onclick = function() {
                    if (!isPast) {
                        selectDate(dayDiv, day);
                    }
                };

                calendarDays.appendChild(dayDiv);
            }
        }

        async function selectDate(dayElement, day) {
            if (selectedDay) {
                selectedDay.classList.remove("selected");
            }
            
            dayElement.classList.add("selected");
            selectedDay = dayElement;
            selectedDate = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            
            const formattedDate = `${day} ${months[currentMonth]} ${currentYear}`;
            
            document.getElementById('selectedDateBadge').textContent = `📅 ${formattedDate}`;
            document.getElementById('confirmDate').textContent = `Tanggal: ${formattedDate}`;
            document.getElementById('formContainer').style.display = 'block';
            document.getElementById('confirmation').style.display = 'none';
            
            // Load booked slots for selected date
            await loadBookedSlots(selectedDate);
            
            document.getElementById('formContainer').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        async function loadBookedSlots(date) {
            try {
                const response = await fetch(`/lab-ekonomi-u/booked-slots?date=${date}`);
                const result = await response.json();
                
                if (result.success) {
                    bookedSlots = result.booked_slots;
                    updateTimeSlotOptions();
                }
            } catch (error) {
                console.error('Error loading booked slots:', error);
                bookedSlots = [];
            }
        }

        function updateTimeSlotOptions() {
            const timeSlotSelect = document.getElementById('timeSlot');
            const options = timeSlotSelect.querySelectorAll('option');
            
            options.forEach(option => {
                if (option.value !== '') {
                    if (bookedSlots.includes(option.value)) {
                        option.disabled = true;
                        option.textContent = option.value + ' (Sudah Dibooking)';
                    } else {
                        option.disabled = false;
                        option.textContent = option.value;
                    }
                }
            });
            
            // Reset selected value if it's booked
            if (bookedSlots.includes(timeSlotSelect.value)) {
                timeSlotSelect.value = '';
            }
        }

        function previousMonth() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            if (selectedDay) {
                selectedDay.classList.remove('selected');
                selectedDay = null;
            }
            selectedDate = null;
            bookedSlots = [];
            document.getElementById('formContainer').style.display = 'none';
            generateCalendar();
            
            document.querySelector('.calendar').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function nextMonth() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            if (selectedDay) {
                selectedDay.classList.remove('selected');
                selectedDay = null;
            }
            selectedDate = null;
            bookedSlots = [];
            document.getElementById('formContainer').style.display = 'none';
            generateCalendar();
            
            document.querySelector('.calendar').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function backToCalendar() {
            if (selectedDay) {
                selectedDay.classList.remove('selected');
                selectedDay = null;
            }
            selectedDate = null;
            bookedSlots = [];
            document.getElementById('formContainer').style.display = 'none';
            document.getElementById('confirmation').style.display = 'none';
            document.getElementById('bookingForm').reset();
            
            document.querySelector('.calendar').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function resetBooking() {
            selectedDate = null;
            if (selectedDay) {
                selectedDay.classList.remove('selected');
                selectedDay = null;
            }
            
            bookedSlots = [];
            document.getElementById('bookingForm').reset();
            document.getElementById('formContainer').style.display = 'none';
            document.getElementById('confirmation').style.display = 'none';
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        document.getElementById('bookingForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            
            const formData = {
                name: document.getElementById('name').value,
                nim: document.getElementById('nim').value,
                whatsapp: document.getElementById('wa').value,
                reason: document.getElementById('reason').value,
                time_slot: document.getElementById('timeSlot').value,
                booking_date: selectedDate
            };

            try {
                const response = await fetch('/lab-ekonomi-u/booking', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.success) {
                    const formattedDate = `${selectedDate.split('-')[2]} ${months[parseInt(selectedDate.split('-')[1]) - 1]} ${selectedDate.split('-')[0]}`;
                    document.getElementById('confirmDate').textContent = `Tanggal: ${formattedDate}`;
                    document.getElementById('confirmTime').textContent = `Waktu: ${formData.time_slot}`;
                    document.getElementById('confirmName').textContent = `Atas nama: ${formData.name}`;
                    
                    document.getElementById('formContainer').style.display = 'none';
                    document.getElementById('confirmation').style.display = 'block';
                    document.getElementById('confirmation').scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else {
                    alert(result.message || 'Terjadi kesalahan saat mengirim booking. Silakan coba lagi.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim booking. Silakan coba lagi.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Permohonan';
            }
        });
        window.onload = function() {
            generateCalendar();
        };
    </script>
</body>
</html>
