<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}
require 'functions.php';

// ambil data dari url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$kmb = query("SELECT * FROM kambing WHERE id =$id")[0];

//cek apakah tombol submit sudah pernah di tekan
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak 
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
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
    <title>Ubah data kambing</title>
</head>

<body>

    <h1>Ubah data kambing</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $kmb["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $kmb["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $kmb["nama"]; ?>">
            </li>
            <li>
                <label for="jenis">Jenis : </label>
                <input type="text" name="jenis" id="jenis" value="<?= $kmb["jenis"]; ?>">
            </li>
            <li>
                <label for="warna">Warna : </label>
                <input type="text" name="warna" id="warna" value="<?= $kmb["warna"]; ?>">
            </li>
            <li>
                <label for="berat">Berat : </label>
                <input type="text" name="berat" id="berat" value="<?= $kmb["berat"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label><br>
                <img src="img/<?= $kmb['gambar']; ?>" width="60"><br>
                <input type="file" name="gambar" id="gambar">
            </li><br>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    </form>



</body>

</html>