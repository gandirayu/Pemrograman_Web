<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

require 'koneksi.php';
if (isset($_POST["submit"])) {
    if (input($_POST) > 0 ) {
        echo "<script>
                alert('Input Berhasil!');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Input Tidak Berhasil');
                document.location.href = 'index.php';
              </script>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sticky-md-top">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #232931;">
            <div class="container">
                <a class="navbar-brand" href="index.php" style="font-size: larger;"><b>Halaman Admin</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item" style="margin-right: 40px;"><a class="nav-link" href="input.php" style="color: rgb(220, 220, 220)">Tambah Data</a></li>
                        <li class="nav-item" ><a class="nav-link" href="logout.php" style="color: rgb(220, 220, 220)">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="max-auto" style="margin-top: 10px; margin-bottom: 50px; margin-left: 50px; margin-right: 50px">
        <table>
            <tr>
                <td><h1 style="padding-bottom: 30px">Input Data Mahasiswa</h1></td><br>
                <td><a class="btn btn-link" href="index.php">Back to Home</a><br></td>
            </tr>
        </table>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-md-8">
                <input class="form-control" type="number" name="nrp" placeholder="NRP" required>
            </div><br>
            <div class="col-md-8">
                <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama" required>
            </div><br>
            <div class="col-md-8">
                <input class="form-control" type="text" name="gender" id="gender" placeholder="Jenis Kelamin" required>
            </div><br>
            <div class="col-md-8">
                <input class="form-control" type="text" name="jurusan" id="jurusan" placeholder="Program Studi" required>
            </div><br>                
            <div class="col-md-8">
                <input class="form-control" type="text" name="email" id="email" placeholder="Email Student" required>
            </div><br>
            <div class="col-md-8">
                <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Alamat" required>
            </div><br>
            <div class="col-md-8">
                <input class="form-control" type="number" name="no_hp" id="no_hp" placeholder="No. HP" required>
            </div><br>
            <div class="col-md-8">
                <input class="form-control" type="text" name="asal_sma" id="asal_sma" placeholder="Asal SMA" required>
            </div><br>
            <div class="col-md-8">
                <input class="form-control" type="text" name="matkul" placeholder="Mata Kuliah Favorit" required>
            </div><br>
            <div class="col-md-8">
                <input class="form-control" type="file" name="gambar" placeholder="Upload File" required>
            </div><br>
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>