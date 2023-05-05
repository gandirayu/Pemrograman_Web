<?php
    require 'koneksi.php';

    if(isset($_POST["regis"])) {
        if(regis($_POST) > 0) {
            echo"<script>
                    alert('User baru berhasil ditambahkan!');
                 </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <style>
        .container {
            display: block;
            margin-top: 60px;
        }
        #content {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col" id="content">
            <img src="assets/bubble-gum-big-screen-phone.png" alt="Registrasion" style="width: 300px">
        </div>
        <div class="col">
            <h1 class="text-center">Registrasi</h1><br>
            <form action="" method="post">
                <div class="col-md-12">
                    <input class="form-control" type="text" name="email" placeholder="Email">
                </div><br>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="usn" placeholder="Username">
                </div><br>
                <div class="col-md-12">
                    <input class="form-control" type="password" name="paswd" id="paswd" placeholder="Password">
                </div><br>
                <div class="col-md-12">
                    <input class="form-control" type="password" name="paswd2" id="paswd2" placeholder="Konfirmasi Password">
                </div><br>
                <button class="btn btn-primary" type="submit" name="regis">Sign Up</button><br><br>
                            <p class="text-left" style="color: rgb(155, 155, 155)">Sudah memiliki akun? <a href="login.php">Sign In</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>