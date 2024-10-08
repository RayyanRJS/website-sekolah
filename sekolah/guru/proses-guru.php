<?php

session_start();
if (!isset($_SESSION["ssLogin"])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $nama = htmlspecialchars($_POST['nama']);
    $mapel = $_POST["mapel"];
    $agama = $_POST["agama"];
    $alamat = htmlspecialchars($_POST['alamat']);
    $foto = htmlspecialchars($_FILES['image']['name']);

    if ($foto !== null) {
        $url = "add-guru.php";
        $foto = uploadimg($url);
    }   else {
        $foto = 'default.png';
    }

    mysqli_query($koneksi, "INSERT INTO tbl_siswa VALUES 
                ('$nip', '$nama', '$mapel', '$agama', '$alamat', '$foto')");

    echo "<script>
            alert('Data guru berhasil disimpan');
            document.location.href = 'add-guru.php';
        </script>";
    return;

}   elseif (isset($_POST['update'])) {
    $nip = $_POST['nip'];
    $nama = htmlspecialchars($_POST['nama']);
    $mapel = $_POST['mapel'];
    $agama = $_POST['agama'];
    $alamat = htmlspecialchars($_POST['alamat']);
    $foto = htmlspecialchars($_POST['fotoLama']);

    if ($_FILES['image']['error'] === 4) {
        $fotoGuru = $foto;
    }   else {
        $url = "siswa.php";
        $fotoGuru = uploadimg($url);
        if ($foto != 'default.png') {
            @unlink('../asset/image/' . $foto);
        }
    }

    mysqli_query($koneksi, "UPDATE tbl_guru SET
                nama = '$nama',
                mapel = '$mapel',
                agama = '$agama',
                alamat = '$alamat',
                foto = '$fotoGuru'
                WHERE NIP = '$nip'
                ");

    echo "<script>
            alert('Data guru berhasil diupdate');
            document.location.href='guru.php';
        </script>";
    return;
}

?>