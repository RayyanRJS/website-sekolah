<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once "../config.php";

$id = $_GET["id"];
$foto = $_GET["foto"];

mysqli_query($koneksi, "DELETE FROM tbl_guru WHERE id = $id");
if ($foto != 'default.png') {
    unlink("../asset/image" . $foto);
}


echo "<script>
        alert('Data guru berhasil dihapus');
        document.location.href='guru.php';
    </script>";
return;


?>