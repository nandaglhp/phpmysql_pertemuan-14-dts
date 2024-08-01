<?php
$servername = "localhost";
$username = "root";
$password = "";
//membuat koneksi
$conn = mysqli_connect ($servername, $username, $password);
//cek koneksi
if ($conn -> connect_error) {
die ("Koneksi gagal: ". mysqli_connect_error());
}
echo "Koneksi berhasil";
