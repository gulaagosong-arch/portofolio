<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama    = $_POST["nama"] ?? "";
    $email   = $_POST["email"] ?? "";
    $telepon = $_POST["telepon"] ?? "";
    $subjek  = $_POST["subjek"] ?? "";
    $pesan   = $_POST["pesan"] ?? "";

    $sql = "INSERT INTO kontak (nama, email, telepon, subjek, pesan)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssss",
            $nama,
            $email,
            $telepon,
            $subjek,
            $pesan
        );

        if (mysqli_stmt_execute($stmt)) {

            echo "
            <!DOCTYPE html>
            <html lang='id'>

            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>

                <title>Pesan Terkirim</title>

                <link rel='stylesheet' href='style.css'>

                <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            </head>

            <body>

                <div class='success-popup'>

                    <div class='success-popup-box'>

                        <i class='bx bx-check-circle success-icon'></i>

                        <h2>Pesan Berhasil!</h2>

                        <p>Pesan kamu berhasil dikirim.</p>

                        <a href='index.html' class='btn'>Kembali</a>

                    </div>

                </div>

            </body>

            </html>
            ";

        } else {

            echo "<script>
                    alert('Data gagal dikirim.');
                    window.history.back();
                  </script>";
        }

        mysqli_stmt_close($stmt);

    } else {

        echo "<script>
                alert('Terjadi kesalahan pada server.');
                window.history.back();
              </script>";
    }

    mysqli_close($conn);

} else {

    header("Location: index.html");
    exit;

}

?>