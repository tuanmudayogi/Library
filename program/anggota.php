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
      footer 
			{ 
				background: rgb(149,216,233);
				background: linear-gradient(90deg, rgba(149,216,233,1) 0%, rgba(133,211,233,1) 35%, rgba(149,216,233,1) 100%); 
			}
			
			.button-container 
			{
				display: flex;
				justify-content: flex-end; 
				align-items: flex-start; 
				margin: auto; 
			}
		
			.button-container a 
			{
				padding: 5px 15px;
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
        <h2 class="text-center">Data Anggota </h2>
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
           Tambah Anggota
            </button>

            <!-- Modal Tambah -->
            <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Anggota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="crud_anggota.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Anggota</label>
                            <?php
                            include "koneksi.php";

                            $query = mysqli_query($koneksi, "SELECT max(kode_anggota) as kodeTerakhir FROM t_anggota");
                            $data = mysqli_fetch_array($query);
                            $kodeTerakhir = $data['kodeTerakhir'];
                            $urutan = (int) substr($kodeTerakhir, 3, 3);
                            $urutan++;
                            $huruf = "KA";
                            $Kode = $huruf . sprintf("%03s", $urutan);
                            ?>
                         <input type="text" class="form-control" value="<?php echo $Kode ?>" name="tkodeanggota" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control" name="tnis" placeholder="Masukkan NIS">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Anggota">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="talamat" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select class="form-select" name="tkelas">
                                <option selected disabled>-- Harap Pilih Kelas --</option>
                                <option value="1A"> 1A</option>
                                <option value="1B"> 1B</option>
                                <option value="2A"> 2A</option>
                                <option value="2B"> 2B</option>
                                <option value="3A"> 3A</option>
                                <option value="3B"> 3B</option>
                                <option value="4A"> 4A</option>
                                <option value="4B"> 4B</option>
                                <option value="5A"> 5A</option>
                                <option value="5B"> 5B</option>
                                <option value="6A"> 6A</option>
                                <option value="6B"> 6B</option>   
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <!-- AKHIR MODAL TAMBAH-->

        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>No</th>
                <th>Kode Anggota</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>

            <?php

            //menampilkan data
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM t_anggota ORDER BY id_anggota DESC");
            while ($data = mysqli_fetch_array($tampil)):
            ?>

            <tr>
                <td><?= $no++ ?> </td>
                <td><?= $data['kode_anggota'] ?></td>
                <td><?= $data['nis'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['kelas'] ?></td>
                <td>
                    <a href="anggota.php"class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                    <a href="#"class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class="fa-solid fa-eraser" style="color: #ffffff;"></i></a>
                </td>
            </tr>

            <!-- Modal Edit-->
            <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" 
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Anggota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="crud_anggota.php">
                    <input type="hidden" name="id_anggota" value="<?= $data['id_anggota'] ?>">

                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Anggota</label>
                            <input type="text" class="form-control" name="tkodeanggota" value="<?= $data['kode_anggota'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control" name="tnis" value="<?= $data['nis'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="talamat" rows="3"><?=$data['alamat']?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-group">Kelas</label>
                            <select class="form-control" name="tkelas">
                                <option selected value="<?= $data['kelas'] ?>"><?= $data['kelas'] ?> (Dipilih Sebelumnya)</option>
                                <option value="1A"> 1A</option>
                                <option value="1B"> 1B</option>
                                <option value="2A"> 2A</option>
                                <option value="2B"> 2B</option>
                                <option value="3A"> 3A</option>
                                <option value="3B"> 3B</option>
                                <option value="4A"> 4A</option>
                                <option value="4B"> 4B</option>
                                <option value="5A"> 5A</option>
                                <option value="5B"> 5B</option>
                                <option value="6A"> 6A</option>
                                <option value="6B"> 6B</option>                      
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
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

                <form method="POST" action="crud_anggota.php">
                    <input type="hidden" name="id_anggota" value="<?= $data['id_anggota'] ?>">

                <div class="modal-body">
                       
                    <h5 class="text-center"> Apakah anda yakin akan menghapus data ini <br>
                      <span class="text-danger"><?= $data['kode_anggota'] ?> - <?= $data['nama'] ?></span> 
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
        </table>
        <div class="button-container">
          <a type="button" class="btn btn-success mb-3" href="../laporan/cetakanggota.php" target="_blank">Cetak</a>
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

