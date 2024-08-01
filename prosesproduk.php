<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbpro"; // Nama database yang digunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah tabel produk ada, jika tidak buat tabelnya
$sql_create_table = "CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga DECIMAL(10, 2) NOT NULL,
    kategori VARCHAR(50) NOT NULL
)";

if ($conn->query($sql_create_table) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Mengambil data dari formulir
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];

// Menyiapkan SQL untuk memasukkan data
$sql_insert = "INSERT INTO produk (nama, harga, kategori) VALUES ('$nama', '$harga', '$kategori')";

// Mengeksekusi query
if ($conn->query($sql_insert) === TRUE) {
    echo "Produk baru berhasil ditambahkan";
} else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();

