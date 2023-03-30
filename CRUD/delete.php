<?php
    require 'koneksi.php';

        $id = $_GET["id"];
        if (delete($id) > 0) {
            echo "Hapus berhasil! . <a href='index.php'>Lihat Data</a>";
        }
?>
