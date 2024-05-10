<?php
    //panggil koneksi database
    include "koneksi.php"; 
?>  

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link rel="stylesheet" href="fontawesome/css/all.min.css">
     <style type="text/css">
      footer { background: rgb(149,216,233);
             background: linear-gradient(90deg, rgba(149,216,233,1) 0%, rgba(133,211,233,1) 35%, rgba(149,216,233,1) 100%); }
             .button-container {
    display: flex;
    justify-content: flex-end; /* Ini akan membuat konten dipojok kanan */
    align-items: flex-start; /* Ini akan membuat konten di atas */
    margin: auto; /* Sesuaikan margin sesuai kebutuhan Anda */
}

/* Opsional: Menambahkan padding pada tombol */
.button-container a {
    padding: 5px 15px; /* Sesuaikan padding sesuai kebutuhan Anda */
}
     </style>
    


    <title>Perpustakaan</title>
  </head>
  <body background="img/bok.png">

    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand">PERPUSTAKAAN SDN CICADAS BARAT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Master
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="anggota.php">Data Anggota</a></li>
            <li><a class="dropdown-item" href="buku.php">Data Buku</a></li>
            <li><a class="dropdown-item" href="kategori.php">Data Kategori</a></li>
            <li><a class="dropdown-item" href="penerbit.php">Data Penerbit</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Transaksi
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../transaksi/transaksi.php">Peminjaman Buku</a></li>
            <li><a class="dropdown-item" href="../transaksi/kembalibuku.php">Pengembalian Buku</a></li>
            <li><a class="dropdown-item" href="../transaksi/bukuhilang.php">Buku Hilang</a></li>
			 <li><a class="dropdown-item" href="../transaksi/gantirugibuku.php">Ganti Rugi</a></li>
          </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page"  href="../logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
  </nav>
    <!-- Akhir Navbar -->

<div class="container">
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
        <h2 class="text-center">Data Buku </h2>
        <h6 class="text-center">
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
        </h6>
        </div>
     <div class="card-body">

    <!-- MODAL -->
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
           Tambah Buku
            </button>

            <!-- Modal Tambah -->
            <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="crud_buku.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Buku</label>
                            <?php
                            include "koneksi.php";

                            $query = mysqli_query($koneksi, "SELECT max(kode_buku) as kodeTerakhir FROM t_buku");
                            $data = mysqli_fetch_array($query);
                            $kodeTerakhir = $data['kodeTerakhir'];
                            $urutan = (int) substr($kodeTerakhir, 3, 3);
                            $urutan++;
                            $huruf = "KB";
                            $Kode = $huruf . sprintf("%03s", $urutan);
                            ?>
                         <input type="text" class="form-control" value="<?php echo $Kode ?>" name="tkode" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" name="tjudul" placeholder="Masukkan Judul Buku">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" class="form-control" name="tpenulis" placeholder="Masukkan Nama Penulis">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Penerbit</label>
                            <select class="form-control select" name="tpenerbit">
                            <option selected disabled>-- Harap Pilih Penerbit Buku --</option>
                            <?php

                            $sql = mysqli_query($koneksi, "SELECT * FROM t_penerbit");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['nama_penerbit']; ?>"> <?= $data['nama_penerbit']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-control select2" name="tkategori">
                            <option selected disabled>-- Harap Pilih Kategori Buku --</option>
                            <?php

                            $sql = mysqli_query($koneksi, "SELECT * FROM t_kategori");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['nama_kategori']; ?>"> <?= $data['nama_kategori']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control" name="ttahun" placeholder="Masukkan Tahun Terbit">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Buku</label>
                            <input type="text" class="form-control" name="tjumlah" placeholder="Masukkan Jumlah Buku">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi Buku</label>
                            <select class="form-control select3" name="tlokasi">
                            <option selected disabled>-- Harap Pilih Lokasi Buku --</option>
                            <?php
                            

                            $sql = mysqli_query($koneksi, "SELECT * FROM t_lokasibuku");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['rak']; ?>"> <?= $data['rak']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <!-- AKHIR MODAL TAMBAH-->
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Nama Penulis</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Buku</th>
                <th>Lokasi Buku</th>
                <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php

            //menampilkan data
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM t_buku ORDER BY id_buku DESC");
            while ($data = mysqli_fetch_assoc($tampil)):
            ?>

            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $data['kode_buku'] ?></td>
                <td><?= $data['judul'] ?></td>
                <td><?= $data['id_penulis'] ?></td>
                <td><?= $data['id_penerbit'] ?></td>
                <td><?= $data['id_kategori'] ?></td>
                <td><?= $data['tahun_terbit'] ?></td>
                <td><?= $data['jumlah_buku'] ?></td>
                <td><?= $data['lokasi'] ?></td>
                <td>
                    <a href="#"class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                    <a href="#"class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class="fa-solid fa-eraser" style="color: #ffffff;"></i></a>
                </td>
            </tr>

            <!-- Modal Edit-->
            <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" 
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="crud_buku.php">
                    <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">

                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Buku</label>
                            <input type="text" class="form-control" name="tkode" value="<?= $data['kode_buku'] ?>" 
                            placeholder="Masukkan Kode Buku">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="tjudul" value="<?= $data['judul'] ?>" 
                            placeholder="Masukkan Judul Buku">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Penulis</label>
                            <input type="text" class="form-control" name="tpenulis" value="<?= $data['id_penulis'] ?>" 
                            placeholder="Masukkan Nama Penulis">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Penerbit</label>
                            <select class="form-control select2" name="tpenerbit">
                                <option selected value="<?= $data['id_penerbit']; ?>"><?= $data['id_penerbit']; ?> (Dipilih Sebelumnya)</option>
                                <?php
                                include "koneksi.php";

                                $sql = mysqli_query($koneksi, "SELECT * FROM t_penerbit");
                                while ($data_pene = mysqli_fetch_array($sql)) {
                                ?>
                                    <option value="<?= $data_pene['nama_penerbit']; ?>"> <?= $data_pene['nama_penerbit']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-control select2" name="tkategori">
                                <option selected value="<?= $data['id_kategori']; ?>"><?= $data['id_kategori']; ?> (Dipilih Sebelumnya)</option>
                                <?php
                                include "koneksi.php";

                                $sql = mysqli_query($koneksi, "SELECT * FROM t_kategori");
                                while ($data_kate = mysqli_fetch_array($sql)) {
                                ?>
                                    <option value="<?= $data_kate['nama_kategori']; ?>"> <?= $data_kate['nama_kategori']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control" name="ttahun" value="<?= $data['tahun_terbit']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Buku</label>
                            <input type="text" class="form-control" name="tjumlah" value="<?= $data['jumlah_buku']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Lokasi</label>
                            <select class="form-control select2" name="tlokasi">
                            <option selected value="<?= $data['lokasi']; ?>"><?= $data['lokasi']; ?> (Dipilih Sebelumnya)</option>
                                <?php
                                include "koneksi.php";

                                $sql = mysqli_query($koneksi, "SELECT * FROM t_lokasibuku");
                                while ($data_pene = mysqli_fetch_array($sql)) {
                                ?>
                                    <option value="<?= $data_pene['rak']; ?>"> <?= $data_pene['rak']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <!-- AKHIR MODAL EDIT -->

            <!-- Modal Hapus -->
            <div class="modal fade modal-lg" id="modalHapus<?= $no ?>" data-bs-backdrop="static" 
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="crud_buku.php">
                    <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">

                <div class="modal-body">
                       
                    <h5 class="text-center"> Apakah anda yakin akan menghapus data ini <br>
                      <span class="text-danger"><?= $data['kode_buku'] ?> - <?= $data['judul'] ?></span> 
                    </h5> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary" name="bhapus">Ya, Hapus Saja!</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <!-- AKHIR MODAL Hapus -->


            <?php endwhile; ?>
            </tbody>
        </table>
        <div class="button-container">
    <a type="button" class="btn btn-success mb-3" href="../laporan/cetakbuku.php" target="_blank">Cetak</a>
        </div>
        </div>

    </div>
    </div>

</div>

<footer class="fixed-bottom">
         <foot class="footer-brand text-dark"><marquee>Copyright @ PERPUSTAKAAN SDN CICADAS BARAT 2023 - All Rights Reserved </marquee></foot>
      </footer>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
