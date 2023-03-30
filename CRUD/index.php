<?php
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
    <div class="max-auto" style="margin-top: 50px; margin-bottom: 50px; margin-left: 50px; margin-right: 50px">
    <h1 class="text-center">Data Mahasiswa</h1>
    <a class="btn btn-success" href="input.php">Tambahkan data</a>
        <div class="text-center">
            
            <table class="table table-striped">
            <thead>
                <tr>
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
                    <td>Opsi</td>
                </tr>
                <?php $nomor=1;
                    foreach ($student as $data) :
                ?>
            </thead>
            <tbody>
                <tr>
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
                    <td>
                        <a class="btn btn-link" href="edit.php?id=<?= $data['id'] ?>">Edit</a><br>
                        <a class="btn btn-danger" href="delete.php?id=<?= $data['id'] ?>">Delete</a>
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