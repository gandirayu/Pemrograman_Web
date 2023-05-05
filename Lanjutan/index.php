<?php
    session_start();    
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    require 'koneksi.php';
    $student = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
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
    <div class="max-auto" style="margin-top: 40px; margin-bottom: 50px;">
    <h1 class="text-center" style="margin-left: 40px; margin-bottom: 30px">Data Mahasiswa</h1>
        <div class="text-center">
            <table class="table table-striped">
            <thead>
                <tr width="30px">
                    <td>#</td>
                    <td>NRP</td>
                    <td>Nama</td>
                    <td>Jenis Kelamin</td>
                    <td>Program Strudi</td>
                    <td>Email Student</td>
                    <td>Alamat</td>
                    <td>No. HP</td>
                    <td>Asal SMA</td>
                    <td>Mata Kuliah Favorit</td>
                    <td>Gambar</td>
                    <td>Opsi</td>
                </tr>
                <?php $nomor=1;
                    foreach ($student as $data) :
                ?>
            </thead>
            <tbody>

                <tr style="width:30px">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nrp']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['gender']; ?></td>
                    <td><?php echo $data['jurusan']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['no_hp']; ?></td>
                    <td><?php echo $data['asal_sma']; ?></td>
                    <td><?php echo $data['matkul']; ?></td>
                    <td><img src="assets/<?=$data['gambar'] 
                    ?>" style="width: 60px"></td>
                    <td>
                        <a class="btn btn-warning" href="edit.php?id=<?= $data['id'] ?>" style="padding: 3px 0px 3px 0px; height: 35px; width: 70px">Edit</a><br>
                        <a class="btn btn-danger" href="delete.php?id=<?= $data['id'] ?>" style="padding: 3px 0px 3px 0px; height: 35px; width: 70px">Hapus</a><br>
                        <a class="btn btn-primary" href="download.php?id=<?= $data['gambar'] ?>" style="padding: 3px 0px 3px 0px; height: 35px; width: 70px">Unduh</a>
                    </td>
                </tr>
                <?php $nomor++;
                    endforeach;
                ?>
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>