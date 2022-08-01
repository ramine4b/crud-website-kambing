<?php
require 'functions.php';
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman registrasi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        label {
            display: block;
        }

        li {
            list-style: none;
        }

        h1 {
            padding-top: 50px;
        }

        body {
            text-align: center;
            background-color: #888;
            line-height: 30px;
        }

        form {
            margin-right: 50px;
        }

        .container {
            width: 400px;
            height: 100vh;
            background-color: lightblue;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Halaman Registrasi</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <label for="password2">Konfirmasi password :</label>
                    <input type="password" name="password2" id="password2">
                </li>
                <li>
                    <button type="submit" name="register">Register!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>