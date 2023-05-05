<?php
    session_start();

    //cek cookie
    if(isset($_COOKIE['login'])) {
        if($_COOKIE['login'] == 'true') {
            $_SESSION = true;
        }
    }

    if(isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    require 'koneksi.php';

    if(isset($_POST["login"])) {
        $usn = $_POST["usn"];
        $paswd = $_POST["paswd"];

        $result = mysqli_query($conn, "SELECT * from users WHERE usn = '$usn'");
        
        //cek usn ada apa tidak di db
        if(mysqli_num_rows($result)==1) {
            
            //cek paswd
            $row = mysqli_fetch_assoc($result);
            if(password_verify($paswd, $row["paswd"])) {

                //session
                $_SESSION["login"] = true;

                //cek remember
                if(isset($_POST['remember'])) {
                    //cookie
                    setcookie('login', 'true', time() + 120);
                }

                header("Location: index.php");
                exit;
            }
        }
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
        <style>
            body {
                background-color: rgb(50, 90, 220);
            }
            .container {
                display: block;
                margin-top: 40px;
            }
            .card {
                margin-top: 50px;
                padding: 40px 30px 60px 30px;
                display: flex;
                justify-content: center;
                
            }
        </style>
    </head>
    <body>
            <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                <div class="card">
                    <b class="card-tittle text-center" style="font-size: 45px">Welcome Back!</b>
                    <p class="text-center" style="color: rgb(155, 155, 155)">Please Login</p><br>
                    <?php if(isset($error)): ?>
                        <i style="color: red">Username atau Password yang anda masukkan salah</i>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="col">
                                <input class="form-control" type="text" name="usn" placeholder="Username">
                            </div><br>
                            <div class="col" style="padding-bottom: 10px">
                                <input class="form-control" type="password" name="paswd" id="paswd" placeholder="Password">
                            </div>
                            <div class="col" style="padding-bottom: 10px">
                                <input type="checkbox" name="remember" id="remember" style="color: rgb(130, 130, 130)">
                                <label for="remember" style="color: rgb(90, 90, 90)"> Remember Me</label>
                            </div>
                            <button class="btn btn-primary" type="submit" name="login">Login</button><br><br>
                            <p class="text-left" style="color: rgb(155, 155, 155)">Belum memiliki akun? <a href="registrasi.php">Sign Up</a></p>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>