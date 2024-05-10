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
    </style>
    <title>Ganti Rugi Buku</title>
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
              <a class="nav-link active" aria-current="page" href="../program/index.php">Beranda</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Data Master</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../program/anggota.php">Data Anggota</a></li>
                <li><a class="dropdown-item" href="../program/buku.php">Data Buku</a></li>
                <li><a class="dropdown-item" href="../program/kategori.php">Data Kategori</a></li>
                <li><a class="dropdown-item" href="../program/penerbit.php">Data Penerbit</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Data Transaksi</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="transaksi.php">Peminjaman Buku</a></li>
                <li><a class="dropdown-item" href="kembalibuku.php">Pengembalian Buku</a></li>
                <li><a class="dropdown-item" href="bukuhilang.php">Buku Hilang</a></li>
			          <li><a class="dropdown-item" href="gantirugibuku.php">Ganti Rugi</a></li>
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

    <!-- Advanced Tables -->
    <div class="container">
      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          <h2 class="text-center">Data Ganti Rugi Buku</h2>
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
          <div class="table-responsive">
            <table  class="display table table-bordered" id="transaksi">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Nis</th>
                  <th>Nama Peminjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Terlambat</th>
                  <th>Denda</th>
                  <th>Ganti Rugi</th>
                  <th>Total</th>
                  <th>Status</th>
                </tr>
              </thead>	

              <tbody>
                <?php 
                  include "koneksi.php";
          
                  $no = 1;
                  $sql = $koneksi->query("select * from t_transaksi where status='Lunas'");
                  while ($data = $sql->fetch_assoc()) {
                ?>
          
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['judul']; ?></td>
                  <td><?php echo $data['nis']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['tanggal_pinjam']; ?></td>
                  <td><?php echo $data['tanggal_kembali']; ?></td>
                  <td><?php echo $data['lambat'].'hari'; ?></td>
                  <td><?php echo $data['denda']; ?></td>
                  <td>
                    <?php
                      $gantirugi = 50000;
                        echo "Rp ". $gantirugi;
                    ?>
                  </td>
                  <td>
                    <?php
                      $gantirugi = 50000;
                      $total = $gantirugi + $data['denda'];
                      echo "Rp ". $total;
                    ?>
                  </td>
                  <td><?php echo $data['status']; ?></td>
                </tr>
                    <?php 
                      }
                    ?>
              </tbody>
            </table>
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
