<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}
require 'functions.php';
$kambing = query("SELECT * FROM kambing");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $kambing = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE  =edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <a href="logout.php">Logout</a>

    <h1>Daftar Kambing</h1>

    <a href="tambah.php">Tambah data kambing</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" autofocus size="40" autocomplete="off" placeholder="Masukan keyword pencarian...">
        <button type="submit" name="cari">Cari!</button>
    </form> <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No,</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Berat</th>
            <th>Warna</th>
        </tr>

        <?php $i = 1; ?>

        <?php foreach ($kambing as $row) : ?>

            <tr>
                <td><?= $i;  ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm ('Yakin???');">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" alt="image" width="70"></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["jenis"]; ?></td>
                <td><?= $row["berat"]; ?></td>
                <td><?= $row["warna"]; ?></td>
            </tr>

            <?php $i++; ?>

        <?php endforeach; ?>

    </table>


</body>

</html>