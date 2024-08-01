<?php
require_once 'Mahasiswa.php';
$mahasiswa = new Mahasiswa();

$id = $_GET['id'];
echo $mahasiswa->delete($id);
?>
