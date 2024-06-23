// scripts.js

document.addEventListener('DOMContentLoaded', function() {
    // Ambil referensi modal
    var modal = document.getElementById('reservationModal');

    // Ambil tombol yang menutup modal
    var closeButton = modal.querySelector('.close');

    // Fungsi untuk menutup modal
    function closeModal() {
        modal.style.display = 'none';
    }

    // Event listener untuk tombol close
    closeButton.addEventListener('click', function() {
        closeModal();
    });

    // Event listener untuk klik di luar modal
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Fungsi untuk membuka modal
    function openModal() {
        modal.style.display = 'block';
    }

    // Ambil tombol reservasi
    var reserveButton = document.querySelector('.reserve-btn');

    // Event listener untuk membuka modal saat tombol reservasi diklik
    reserveButton.addEventListener('click', function(event) {
        event.preventDefault(); // Menghentikan aksi default (pergi ke halaman lain)

        openModal();
    });
});
