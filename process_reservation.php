<?php
// Mengambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$guests = $_POST['guests'];
$room = $_POST['room'];
$requests = $_POST['requests'];

// Koneksi ke database
$servername = "localhost";
$username = "root"; // Username default XAMPP
$password = ""; // Kosongkan jika menggunakan XAMPP default
$dbname = "hotel_reservation"; // Nama database

// Membuat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menyiapkan query untuk memasukkan data ke tabel
$sql = "INSERT INTO reservations (name, email, phone, checkin, checkout, guests, room, requests)
        VALUES ('$name', '$email', '$phone', '$checkin', '$checkout', '$guests', '$room', '$requests')";

// Mengeksekusi query dan mengecek apakah data berhasil dimasukkan
if ($conn->query($sql) === TRUE) {
    // Jika berhasil, tampilkan popup sukses dan redirect ke halaman index setelah 2 detik
    echo "<script>
            alert('Reservation successful!');
            setTimeout(function() {
                window.location.href = 'index.html'; // Redirect ke halaman index
            }, 2000); // 2 detik delay
          </script>";
} else {
    // Jika gagal, tampilkan pesan error
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
