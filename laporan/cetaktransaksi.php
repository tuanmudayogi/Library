<?php
	include "../transaksi/function.php";

	$koneksi = new mysqli("localhost","root","","perpustakaan");

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_data_transaksi(".date('d-m-Y').").xls");
?>	

<h2>Laporan Data Transaksi</h2>

<table border="1">
    <tr>									
        <th>No</th>
        <th>Judul</th>
        <th>Nis</th>
        <th>Nama Peminjam</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Terlambat</th>
        <th>Status</th>
    </tr>
									
    <tbody>
        <?php 						
            $no = 1;
            $sql = $koneksi->query("select * from t_transaksi");
            while ($data = $sql->fetch_assoc()) { 
        ?>
                            
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['nis']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['tanggal_pinjam']; ?></td>
            <td><?php echo $data['tanggal_kembali']; ?></td>
            <td><?php echo $data['lambat']. ' hari'; ?></td>
            <td><?php echo $data['status']; ?></td>
        </tr>
        <?php 
            }
        ?>
    </tbody>
</table>