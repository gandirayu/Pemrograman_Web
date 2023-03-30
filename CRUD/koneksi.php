<?php
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

    $query = "INSERT INTO mahasiswa
            VALUES
            ('', '$nrp', '$nama', '$gender','$jurusan', '$email', '$alamat', '$no_hp', '$asal_sma', '$matkul')
        ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function edit($data) {
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
    $id = ($data['id']);
    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                gender = '$gender',
                jurusan = '$jurusan',
                email = '$email',
                alamat = '$alamat',
                no_hp = '$no_hp',
                asal_sma = '$asal_sma',
                matkul = '$matkul'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}