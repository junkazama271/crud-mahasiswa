<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="<?= BASE_URL . 'assets/style2.css' ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="topbar">
        <h3 class="text-topbar">Data Mahasiswa FTI</h3>
    </div>

    <div class="content">
        <div class="card-register">
            <div class="card-main">
                <div class="card-header">Form Register</div>
                <div class="card-body">
                    <form class="form-register" method="POST" action="<?= BASE_URL . 'process/process_register.php' ?>">
                        <label class="form-label">New Username </label>
                        <input type="username" name="username" class="form-input">
                        <label class="form-label">New Password </label>
                        <input type="password" name="password" class="form-input">
                        <button type="submit" class="btn btn-register">Register</button>
                    </form>
                    <p style="text-align: center;">Sudah memiliki akun?<span><a href="<?= BASE_URL . 'process/process_login.php' ?>" class=""> Login disini</a></span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>