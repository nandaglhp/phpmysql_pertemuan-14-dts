<?php
require_once 'Database.php';

class Mahasiswa extends Database {
    public function create($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk) {
        $sql = "INSERT INTO mahasiswa (nim, nama, tempat_lahir, tanggal_lahir, jurusan, program_studi, ipk)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssd", $nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk);

        if ($stmt->execute()) {
            return "Data successfully inserted!";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function read() {
        $sql = "SELECT * FROM mahasiswa";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function update($id, $nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk) {
        $sql = "UPDATE mahasiswa SET nim=?, nama=?, tempat_lahir=?, tanggal_lahir=?, jurusan=?, program_studi=?, ipk=?
                WHERE id=?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssdi", $nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk, $id);

        if ($stmt->execute()) {
            return "Data successfully updated!";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM mahasiswa WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return "Data successfully deleted!";
        } else {
            return "Error: " . $stmt->error;
        }
    }
}
?>
