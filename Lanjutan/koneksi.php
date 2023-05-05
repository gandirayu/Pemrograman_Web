<?php //melakukan koneksi ke database 
$conn = mysqli_connect("localhost", "root", "", "data_mhs");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function input($data) {
    global $conn;
    $nrp = ($data["nrp"]);    
    $nama = ($data["nama"]);
    $gender = ($data["gender"]);
    $jurusan = ($data["jurusan"]);
    $email = ($data["email"]);
    $alamat = ($data["alamat"]);
    $no_hp = ($data["no_hp"]);
    $asal_sma = ($data["asal_sma"]);
    $matkul = ($data["matkul"]);

    //upload
    $gambar = upload();
    if(!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa
            VALUES
            ('', '$nrp', '$nama', '$gender','$jurusan','$email','$alamat', '$no_hp', '$asal_sma', '$matkul', '$gambar')
        ";
        
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp = $_FILES['gambar']['tmp_name'];

    //cek ada gambar yg diupload atau tidak
    if($error === 4) {
        echo "<script>
                alert('Upload Gambar');
              </script>";
        return false;
    }

    //cek yg diupload adalah gambar
    $ekstensigambarvld = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if(!in_array($ekstensigambar, $ekstensigambarvld)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    //cek size file
    if($ukuranFile > 1000000) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    //nama baru
    $namabaru = uniqid();
    $namabaru .= '.';
    $namabaru .= $ekstensigambar;

    //upload sesuai
    move_uploaded_file($tmp, 'assets/' . $namabaru);
    return $namabaru;
}

function delete($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function edit($data) {
global $conn;
    $id = ($data['id']);
    $nrp = ($data["nrp"]);
    $nama = ($data["nama"]);
    $gender = ($data["gender"]);
    $jurusan = ($data["jurusan"]);
    $email = ($data["email"]);
    $alamat = ($data["alamat"]);
    $no_hp = ($data["no_hp"]);
    $asal_sma = ($data["asal_sma"]);
    $matkul = ($data["matkul"]);
    $gambarlama = ($data["gambarlama"]);

    //upload gambar baru apa tidak
    if($_FILES['gambar']['error']===4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                gender = '$gender',
                jurusan = '$jurusan',
                email = '$email',
                alamat = '$alamat',
                no_hp = '$no_hp',
                asal_sma = '$asal_sma',
                matkul = '$matkul',
                gambar = '$gambar'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function regis($data) {
    global $conn;
    $email = ($data["email"]);    
    $usn = ($data["usn"]);
    $paswd = mysqli_real_escape_string($conn, $data["paswd"]);
    $paswd2 = mysqli_real_escape_string($conn, $data["paswd2"]);

    //cek usn ada atau tidak
    $result = mysqli_query($conn, "SELECT usn FROM users WHERE usn = '$usn'");
    if(mysqli_fetch_assoc($result)) {
        echo"<script>
                alert('Username telah terdaftar!');
             </script>";
        return false;
    }

    //konfirmasi password
    if($paswd!==$paswd2) {
        echo "<script>
                alert('Pasword tidak sesuai!');
              </script>";
        return false;
    }

    //enkripsi password
    $paswd = password_hash($paswd, PASSWORD_DEFAULT);

    //menambahkan ke db
    mysqli_query($conn, "INSERT INTO users VALUES ('', '$email', '$usn', '$paswd')");
    return mysqli_affected_rows($conn);
}
?>