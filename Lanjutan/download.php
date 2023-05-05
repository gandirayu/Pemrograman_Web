<?php
    $file = $_GET['id'];
    $namafile = 'assets/' . $file;

    if (file_exists($namafile)) {
        $ekstensi = pathinfo($namafile, PATHINFO_EXTENSION);
        $namabaru = 'Profile.' . $ekstensi; //ini buat set nama file gambar yang di download

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $namabaru . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($namafile));
        readfile($namafile);
        exit;
    } else {
        echo "File not found.";
    }
?>