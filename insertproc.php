<?php
$servername = "localhost"; // Variabel $servername yang benar
$username = "root";
$password = "";
$dbname = "dbpro"; // Nama database yang digunakan

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil<br>";

// Menyiapkan SQL untuk memasukkan data
$sql = "INSERT INTO participants (nama, email) VALUES ('Faisal', 'faisal@gmail.com'), ('Tata', 'tata@gmail.com')";

// Mengeksekusi query
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
