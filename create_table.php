<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dboo";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL untuk membuat tabel mahasiswa
$sql = "CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    tempat_lahir VARCHAR(100),
    tanggal_lahir DATE,
    jurusan VARCHAR(100),
    program_studi VARCHAR(100),
    ipk DECIMAL(3, 2)
)";

// Mengeksekusi query
if ($conn->query($sql) === TRUE) {
    echo "Table mahasiswa created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Menutup koneksi
$conn->close();

