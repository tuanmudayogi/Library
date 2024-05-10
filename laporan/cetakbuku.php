<?php
	include "../transaksi/function.php";

	$koneksi = new mysqli("localhost","root","","perpustakaan");

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_data_anggota(".date('d-m-Y').").xls");
?>	

<h2>Laporan Data Buku</h2>

<table border="1">
    <tr>									
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul</th>
        <th>Nama Penulis</th>
        <th>Tahun Terbit</th>
        <th>Penerbit</th>
        <th>Kategori</th>
        <th>Jumlah Buku</th>
        <th>Lokasi Buku</th>
    </tr>
									
    <tbody>
        <?php 						
            $no = 1;
            $sql = $koneksi->query("select * from t_buku");
            while ($data = $sql->fetch_assoc()) { 
        ?>
                            
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['kode_buku'] ?></td>
            <td><?= $data['judul'] ?></td>
            <td><?= $data['id_penulis'] ?></td>
            <td><?= $data['tahun_terbit'] ?></td>
            <td><?= $data['id_penerbit'] ?></td>
            <td><?= $data['id_kategori'] ?></td>
            <td><?= $data['jumlah_buku'] ?></td>
            <td><?= $data['lokasi'] ?></td>
        </tr>
        <?php 
            }
        ?>
    </tbody>
</table>