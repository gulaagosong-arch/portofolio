<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama     = $_POST["nama"];
    $email    = $_POST["email"];
    $telepon  = $_POST["telepon"];
    $subjek   = $_POST["subjek"];
    $pesan    = $_POST["pesan"];

    $sql = "INSERT INTO kontak (nama, email, telepon, subjek, pesan)
            VALUES ('$nama', '$email', '$telepon', '$subjek', '$pesan')";

    if (mysqli_query($conn, $sql)) {
      echo "Data berhasil dikirim.<br>";
      echo "ID terakhir: " . mysqli_insert_id($conn);
    } else {
      echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>