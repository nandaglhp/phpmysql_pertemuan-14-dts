<?php
require_once 'Mahasiswa.php';
$mahasiswa = new Mahasiswa();

$id = $_GET['id'];
$data = $mahasiswa->read();
$row = array_filter($data, fn($item) => $item['id'] == $id);
$row = reset($row);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jurusan = $_POST['jurusan'];
    $program_studi = $_POST['program_studi'];
    $ipk = $_POST['ipk'];

    echo $mahasiswa->update($id, $nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mahasiswa</title>
</head>
<body>
    <h1>Update Mahasiswa</h1>
    <form action="update_form.php?id=<?php echo $id; ?>" method="post">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required><br><br>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>

        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>"><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>"><br><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo $row['jurusan']; ?>"><br><br>

        <label for="program_studi">Program Studi:</label>
        <input type="text" id="program_studi" name="program_studi" value="<?php echo $row['program_studi']; ?>"><br><br>

        <label for="ipk">IPK:</label>
        <input type="number" id="ipk" name="ipk" step="0.01" value="<?php echo $row['ipk']; ?>"><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
