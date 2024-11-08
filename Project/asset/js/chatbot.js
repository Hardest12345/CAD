// Array pertanyaan dan jawaban
const responses = {
    "halo": "Halo! Ada yang bisa saya bantu mengenai Kampung Wisata Keramik Dinoyo?",
    "sejarah": "Kampung Wisata Keramik Dinoyo adalah pusat industri keramik yang sudah ada sejak puluhan tahun lalu.",
    "produk": "Kami menyediakan berbagai macam produk keramik seperti vas bunga, piring, gelas, dan hiasan dinding.",
    "lokasi": "Kampung Wisata Keramik Dinoyo terletak di Dinoyo, Malang, Jawa Timur.",
    "buka": "Kampung Wisata Keramik Dinoyo buka setiap hari dari pukul 08:00 sampai 17:00.",
    "tanya": "ya apa yang ingin kamu tanyakan?"
};

// Fungsi untuk menampilkan pesan dengan timestamp
function displayMessage(message, sender) {
    const messageContainer = document.createElement('div');
    messageContainer.classList.add('message', sender === 'user' ? 'user-message' : 'bot-message');

    // Membuat elemen pesan
    const messageText = document.createElement('div');
    messageText.classList.add('message-text');
    messageText.innerText = message;

    // Membuat elemen timestamp
    const timestamp = document.createElement('span');
    timestamp.classList.add('timestamp');
    const now = new Date();
    timestamp.innerText = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }); // Hanya jam dan menit

    // Tambahkan elemen pesan dan timestamp ke messageContainer
    messageContainer.appendChild(messageText);
    messageContainer.appendChild(timestamp);

    document.getElementById('messages').appendChild(messageContainer);
    document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
}

// Fungsi untuk mengirim pesan
function sendMessage() {
    const userInput = document.getElementById('userInput').value.toLowerCase();
    displayMessage(userInput, 'user');
    document.getElementById('userInput').value = '';

    // Logika untuk menemukan respon
    let botResponse = "Maaf, saya tidak mengerti. Bisa tolong ulangi pertanyaan?";
    for (let key in responses) {
        if (userInput.includes(key)) {
            botResponse = responses[key];
            break;
        }
    }

    setTimeout(() => {
        displayMessage(botResponse, 'bot');
    }, 500);
}

// Fungsi untuk menampilkan pesan otomatis saat halaman pertama kali dibuka
function sendWelcomeMessage() {
    const welcomeMessage = "Halo apa ada yang ingin kamu tanyakan?";
    displayMessage(welcomeMessage, 'bot');
}

// Memastikan pesan "Halo apa ada yang ingin kamu tanyakan?" dikirimkan saat halaman dibuka
document.addEventListener('DOMContentLoaded', (event) => {
    sendWelcomeMessage();
});
