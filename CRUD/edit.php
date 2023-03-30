<?php
    require 'koneksi.php';
    $id = $_GET ['id'];
    $student = query("SELECT * FROM mahasiswa WHERE id = '$id'")[0];
    if (isset($_POST["submit"])) {
        if (edit($_POST) > 0) {
            echo "Edit berhasil! . <a href='index.php'>Lihat Data</a>";
        } else {
            echo "Edit tidak berhasil! . <a href='index.php'>Lihat Data</a>";
        }
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
    <div class="max-auto" style="margin-top: 50px; margin-bottom: 50px; margin-left: 50px; margin-right: 50px">
        <div class="text-center">
            <h1>Ubah Data Mahasiswa</h1><br>
        </div>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $student['id']; ?>">
                <div class="col-md-8">
                    <input class="form-control" type="number" name="nrp" placeholder="NRP" value="<?= $student["nrp"]; ?>" required>
                </div><br>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="nama" placeholder="Nama" value="<?=$student["nama"]; ?>" required>
                </div><br>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="gender" placeholder="Jenis Kelamin" value="<?=$student["gender"]; ?>" required>
                </div><br>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="jurusan" placeholder="Program Studi" value="<?=$student["jurusan"]; ?>" required>
                </div><br>                
                <div class="col-md-8">
                    <input class="form-control" type="text" name="email" placeholder="Email Student" value="<?=$student["email"]; ?>" required>
                </div><br>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="alamat" placeholder="Alamat" value="<?=$student["alamat"]; ?>" required>
                </div><br>
                <div class="col-md-8">
                    <input class="form-control" type="number" name="no_hp" placeholder="No. HP" value="<?=$student["no_hp"]; ?>" required>
                </div><br>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="asal_sma" placeholder="Asal SMA" value="<?=$student["asal_sma"]; ?>" required>
                </div><br>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="matkul" placeholder="Mata Kuliah Favorit" value="<?=$student["matkul"]; ?>" required>
                </div><br>
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </form>
    </div>
</body>
</html>