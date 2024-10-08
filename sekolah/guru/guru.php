<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("Location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Guru - SMA Negeri 1 Surakarta";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"> Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Guru</li>
                        </ol>
                        
                        <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Guru
                            <a href="<?= $main_url ?>guru/add-guru.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Guru</a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col"><center>Nomor</center></th>
                                        <th scope="col"><center>Foto</center></th>
                                        <th scope="col"><center>NIP</center></th>
                                        <th scope="col"><center>Nama</center></th>
                                        <th scope="col"><center>MAPEL</center></th>
                                        <th scope="col"><center>Agama</center></th>
                                        <th scope="col"><center>Alamat</center></th>
                                        <th scope="col"><center>Operasi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Foto Guru</td>
                                        <td>NIP</td>
                                        <td>Nama</td>
                                        <td>MAPEL</td>
                                        <td>Agama</td>
                                        <td>Alamat</td>
                                        <td align="center">
                                            <a href="" class="btn btn-sm btn-warning" title="update guru">
                                                <i class="fa-solid fa-pen"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" id="btnHapus" title="hapus guru" data-id="<?= $data['id']?>" data-foto="<?= $data['foto']?>">
                                                <i class="fa-solid fa-trash"></i></button>
                                        </td>
                                        </tr>
                                        
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </main>

                <!--modal hapus data-->
                <div class="modal" id="mdlHapus" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Anda yakin akan menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="" id="btnMdlHapus" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click', "#btnHapus", function(){
            $('#mdlHapus').modal('show');
            let idGuru = $(this).data('id');
            let fotoGuru = $(this).data('foto');
            $('#btnMdlHapus').attr("href", "hapus-guru.php?id=" + idGuru +"&foto=" + fotoGuru);

        })
    })
</script>


<?php

require_once "../template/footer.php";

?>