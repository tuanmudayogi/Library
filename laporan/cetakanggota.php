<?php
	include "../transaksi/function.php";

	$koneksi = new mysqli("localhost","root","","perpustakaan");

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_data_anggota(".date('d-m-Y').").xls");
?>	

<h2>Laporan Data Anggota</h2>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Anggota</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Alamat</th>
            <th>Kelas</th>
        </tr>
    </thead>
									
	<tbody>	
		<?php 					
            $no = 1;
            $sql = $koneksi->query("select * from t_anggota");
            
            while ($data = $sql->fetch_assoc()) {
		?>
						
        <tr>
            <td><?= $no++ ?> </td>
            <td><?= $data['kode_anggota'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nis'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['kelas'] ?></td>
		</tr>
									
        <?php } ?>
</table>