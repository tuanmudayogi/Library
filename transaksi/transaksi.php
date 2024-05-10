<?php
include "koneksi.php";
include "function.php";

// Mendefinisikan tanggal pinjam dan tanggal kembali default
$tanggal_pinjam = date("Y-m-d");
$tujuh_hari = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$tanggal_kembali = date("Y-m-d", $tujuh_hari);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous">
    <style type="text/css">
        footer {
            background: rgb(149, 216, 233);
            background: linear-gradient(90deg, rgba(149, 216, 233, 1) 0%, rgba(133, 211, 233, 1) 35%, rgba(149, 216, 233, 1) 100%);
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
            margin: auto;
        }

        .button-container a {
            padding: 5px 15px;
        }
    </style>
</head>
<body background="img/bok.png">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">PERPUSTAKAAN SDN CICADAS BARAT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../program/index.php">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item" href="../program/anggota.php">Data Anggota</a></li>
                        <li><a class="dropdown-item" href="../program/buku.php">Data Buku</a></li>
                        <li><a class="dropdown-item" href="../program/kategori.php">Data Kategori</a></li>
                        <li><a class="dropdown-item" href="../program/penerbit.php">Data Penerbit</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data Transaksi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <li><a class="dropdown-item" href="transaksi.php">Peminjaman Buku</a></li>
                        <li><a class="dropdown-item" href="kembalibuku.php">Pengembalian Buku</a></li>
                        <li><a class="dropdown-item" href="bukuhilang.php">Buku Hilang</a></li>
                        <li><a class="dropdown-item" href="gantirugibuku.php">Ganti Rugi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->

<div class="container">
    <!-- Konten lainnya disini -->
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <h2 class="text-center">Data Transaksi</h2>
            <h6 class="text-center">
                <script type='text/javascript'>
                    // Kode JavaScript untuk menampilkan tanggal
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
                </script>
            </h6>
        </div>

        <div class="card-body">
            <!-- Awal Modal -->
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modaltransaksi">
                Tambah Transaksi
            </button>

            <div class="modal fade modal-lg" id="modaltransaksi" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Transaksi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form method="POST" action="tambahtransaksi.php">
                            <div class="modal-body">
                                <label for="buku">Judul Buku</label>
                                <div class="form-group mb-3">
                                    <div class="form-line">
                                        <select required="" name="buku" class="form-control">
                                            <option value="">-- Pilih Judul Buku --</option>
                                            <?php
                                            $sql = $koneksi->query("SELECT * FROM t_buku order by id_buku");
                                            while ($data = $sql->fetch_assoc()) {
                                                echo "<option value='$data[id_buku].$data[judul]'>$data[judul]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <label for="nama">Nama Peminjam</label>
                                <div class="form-group mb-3">
                                    <div class="form-line">
                                        <select required="" name="nama" class="form-control">
                                            <option value="">-- Pilih Nama Peminjam --</option>
                                            <?php
                                            $sql = $koneksi->query("select * from t_anggota order by nis");
                                            while ($data = $sql->fetch_assoc()) {
                                                echo "<option value='$data[nis].$data[nama]'>$data[nis], $data[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <div class="form-group mb-3">
                                    <div class="form-line">
                                        <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal"
                                               value="<?php echo $tanggal_pinjam; ?>" />
                                    </div>
                                </div>

                                <label for="tanggal_kembali">Tanggal Kembali</label>
                                <div class="form-group mb-3">
                                    <div class="form-line">
                                        <input type="date" name="tanggal_kembali" class="form-control" id="tanggal"
                                               value="<?php echo $tanggal_kembali; ?>" />
                                    </div>
                                </div>
                                <hr>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal -->

            <div class="table-responsive">
                <table class="display table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>NIS</th>
                        <th>Nama Peminjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Terlambat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $sql = $koneksi->query("select * from t_transaksi where status='Pinjam'");
                    while ($data = $sql->fetch_assoc()) {
                        $denda2 = $koneksi->query("select * from tb_denda");
                        $denda3 = $denda2->fetch_assoc();
                        $denda4 = $denda3['denda'];
                        $denda4 = (float)$denda4;

                        $tanggal_dateline2 = $data['tanggal_kembali'];
                        $tanggal_kembali = date('Y-m-d');

                        $lambat = terlambat($tanggal_dateline2, $tanggal_kembali);
                        $denda1 = $lambat * $denda4;

                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . $data['judul'] . '</td>';
                        echo '<td>' . $data['nis'] . '</td>';
                        echo '<td>' . $data['nama'] . '</td>';
                        echo '<td>' . $data['tanggal_pinjam'] . '</td>';
                        echo '<td>' . $data['tanggal_kembali'] . '</td>';
                        echo '<td>';
                        if ($lambat > 0) {
                            echo "<font color='red'>$lambat hari<br>(Rp $denda1)</font>";
                        } else {
                            echo $lambat . " Hari";
                        }
                        echo '</td>';
                        echo '<td>' . $data['status'] . '</td>';
                        echo '<td>';
                        echo '<a onclick="return confirm(\'Apakah benar buku ini sudah dikembalikan?\')"
                                href="kembali.php?id=' . $data['id'] . '&judul=' . $data['judul'] . '&lambat=' . $lambat . '&denda=' . $denda1 . '" class="btn btn-primary"> Kembali </a>  '; 
								
                        echo '<a onclick="return confirm(\'Apakah batas waktu peminjaman akan diperpanjang?\')"
                                href="perpanjang.php?id=' . $data['id'] . '&judul=' . $data['judul'] . '&lambat=' . $lambat . '&tanggal_kembali=' . $data['tanggal_kembali'] . '" class="btn btn-warning"> Perpanjang </a>  ';
								
                        echo '<a href="kembalibukuhilang.php?id=' . $data['id'] . '&judul=' . $data['judul'] . '&lambat=' . $lambat . '&denda=' . $denda1 . '" class="btn btn-danger">Hilang</a>  ';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
                <div class="button-container">
                    <a type="button" class="btn btn-success mb-3" href="../laporan/cetaktransaksi.php" target="_blank">Cetak</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="fixed-bottom">
    <foot class="footer-brand text-dark"><marquee>Copyright @ PERPUSTAKAAN SDN CICADAS BARAT 2023 - All Rights Reserved </marquee></foot>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
