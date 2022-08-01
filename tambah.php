<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}
require 'functions.php';
//cek apakah tombol submit sudah pernah di tekan
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak 
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data kambing</title>
</head>

<body>

    <h1>Tambah data kambing</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required autofocus>
            </li>
            <li>
                <label for="jenis">Jenis : </label>
                <input type="text" name="jenis" id="jenis">
            </li>
            <li>
                <label for="warna">Warna : </label>
                <input type="text" name="warna" id="warna">
            </li>
            <li>
                <label for="berat">Berat : </label>
                <input type="text" name="berat" id="berat">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>



</body>

</html>