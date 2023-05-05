<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    require 'koneksi.php';

        $id = $_GET["id"];
        if (delete($id) > 0) {
            echo "<script>
                    alert('Hapus Berhasil!');
                  </script>";
        }
        header("Location: index.php");
        exit;
?>