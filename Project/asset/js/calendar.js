// Mendapatkan referensi elemen
const daysContainer = document.getElementById('days-container');
const monthYearLabel = document.getElementById('month-year');
const selectedDateInput = document.getElementById('selected-date');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');

// Inisialisasi bulan dan tahun
let currentDate = new Date();

// Fungsi untuk mengambil tanggal yang telah dipesan dari server
async function fetchBookedDates(year, month) {
    const monthStr = `${year}-${String(month + 1).padStart(2, '0')}`;
    const response = await fetch(`/booking_test/get_booked_dates.php?month=${monthStr}`);
    return response.json(); // Mengembalikan array tanggal yang telah dipesan
}

async function renderCalendar() {
    // Kosongkan container hari
    daysContainer.innerHTML = '';

    // Mengambil bulan dan tahun saat ini
    const month = currentDate.getMonth();
    const year = currentDate.getFullYear();

    // Menampilkan bulan dan tahun di header
    const monthNames = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    monthYearLabel.textContent = `${monthNames[month]} ${year}`;

    // Mendapatkan tanggal pertama dan terakhir bulan ini
    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    // Mengambil tanggal yang telah dipesan
    const bookedDates = await fetchBookedDates(year, month);

    for (let i = 0; i < firstDay; i++) {
        const emptyDiv = document.createElement('div');
        emptyDiv.classList.add('day');
        emptyDiv.style.cursor = 'default'; // Set cursor untuk elemen kosong
        daysContainer.appendChild(emptyDiv);
    }

    // Membuat elemen untuk setiap tanggal
    for (let date = 1; date <= lastDate; date++) {
        const dayElement = document.createElement('div');
        dayElement.classList.add('day');
        dayElement.textContent = date;

        // Menyimpan tanggal dalam format YYYY-MM-DD
        const fullDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
        dayElement.setAttribute('data-date', fullDate);

        // Warna merah jika tanggal sudah dipesan, hijau jika belum
        if (bookedDates.includes(fullDate)) {
            dayElement.style.backgroundColor = 'red';
            dayElement.style.color = 'white';
            dayElement.style.borderRadius = '50px';
            dayElement.style.cursor = 'not-allowed';
        } else {
            dayElement.style.backgroundColor = 'white';
            dayElement.style.cursor = 'pointer';
            dayElement.addEventListener('mouseenter', () => {
                dayElement.style.backgroundColor = 'black';
                dayElement.style.color = 'white';
            });
            
            // Mengembalikan warna saat mouse keluar dari elemen
            dayElement.addEventListener('mouseleave', () => {
                dayElement.style.backgroundColor = 'white';
                dayElement.style.color = 'black';
            });
        }
        
        // Menambahkan event listener untuk klik pada setiap tanggal
        dayElement.addEventListener('click', () => {
            if (bookedDates.includes(fullDate)) {
                // Jika tanggal sudah dipesan, tampilkan pesan peringatan dan cegah input
                alert("Tanggal ini sudah dipesan. Silakan pilih tanggal lain.");
                selectedDateInput.value = ""; // Kosongkan input
            } else {
                // Jika tanggal tersedia, izinkan pengaturan input
                selectedDateInput.value = fullDate;
            }
        });

        daysContainer.appendChild(dayElement);
    }
}

// Navigasi ke bulan sebelumnya
prevButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
});

// Navigasi ke bulan berikutnya
nextButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
});

// Inisialisasi pertama kali kalender
renderCalendar();
