<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Update data Siswa - SMA Negeri 1 Surakarta";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$nis = $_GET['nis'];

$siswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nis = '$nis'");
$data = mysqli_fetch_array($siswa);

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update data Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="siswa.php">Siswa</a></li>
                            <li class="breadcrumb-item active">Update data Siswa</li>
                        </ol>
                        <form action="proses-siswa.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update data Siswa</span>
                                <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                    <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                <label for="nis" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                <input type="text" name="nis" required readonly class="form-control-plaintext border-bottom ps-2" id="nis" value="<?= $nis ?>">
                                </div>
                            </div>
                                    <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <label for="nis" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                <input type="text" name="nama" required class="form-control border-0 border-bottom ps-2" id="nama" value="<?= $data['nama'] ?>">
                                </div>
                            </div>
                                    <div class="mb-3 row">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <label for="kelas" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                <select name="kelas" id="kelas" class="form-select border-0 border-bottom" required>
                                    <?php
                                    $kelas = ["X-1", "X-2", "X-3", "X-4", "X-5", "X-6", "X-7", "X-8", "X-9", "X-10", "X-11", "XI-1", "XI-2", "XI-3", "XI-4", "XI-5", "XI-6", "XI-7", "XI-8", "XI-9", "XI-10", "XI-11", "XII-1", "XII-1", "XII-2", "XII-3", "XII-4", "XII-5", "XII-6", "XII-7", "XII-8", "XII-9", "XII-10", "XII-11"];
                                    foreach ($kelas as $kls) {
                                        if ($data['kelas'] == $kls) { ?>
                                            <option value="<?= $kls; ?>" selected><?= $kls; ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $kls; ?>"></option>
                                                <?php
                                            } 
                                            
                                        }
                                    
                                    ?>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" placeholder="alamat siswa" class="form-control" required><?= $data['alamat'] ?></textarea>
                                </div>
                            </div>
                                    </div>
                                
                                 
                                <div class="col-4 text-center px-5">
                                    <input type="hidden" name="fotolama" value="<?= $data['foto'] ?>">
                                    <img src="../asset/image/<?= $data['foto'] ?>" alt="" class="mb-3" width="40%">
                                    <input type="file" name="image" class="form-control form-control-sm">
                                    <small class="text-secondary">Pilih foto PNG, JPG, atau JPEG dengan ukuran maksimal 2 MB</small>
                                    <div><small class="text-secondary">width = height</small></div>
                                </div>
                            
                                
                            </div>
                            </div>
                            </form>
        </div>
    </main>

<?php

require_once "../template/footer.php";

?>