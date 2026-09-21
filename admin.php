<?php

session_start();

if (!isset($_SESSION["admin_login"]) || $_SESSION["admin_login"] !== true) {
    header("Location: index.html");
    exit;
}

include "koneksi.php";

$query = "SELECT * FROM kontak ORDER BY id DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Portofolio</title>

    <link rel="stylesheet" href="style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header class="admin-header">

        <a href="index.html" class="logo">Portofolio.</a>

        <a href="logout.php" class="btn">
            Logout
        </a>

    </header>


    <section class="admin-section">

        <div class="admin-container">

            <h1 class="heading">
                Pesan <span>Masuk</span>
            </h1>

            <div class="admin-table">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Subjek</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <tr>

                                <td><?= $no++; ?></td>

                                <td><?= htmlspecialchars($row["nama"]); ?></td>

                                <td><?= htmlspecialchars($row["email"]); ?></td>

                                <td><?= htmlspecialchars($row["telepon"]); ?></td>

                                <td><?= htmlspecialchars($row["subjek"]); ?></td>

                                <td><?= htmlspecialchars($row["pesan"]); ?></td>

                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</body>

</html>

<?php
mysqli_close($conn);
?>