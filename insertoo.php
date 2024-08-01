<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dboo"; // Nama database yang digunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil<br>";

// Menyiapkan SQL untuk memasukkan data
$sql = "INSERT INTO participants (nama, email) VALUES ('Faisal', 'faisal@gmail.com'), ('Tata', 'tata@gmail.com')";

// Mengeksekusi query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
