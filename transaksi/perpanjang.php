<?php 
	include "function.php";
	include "koneksi.php";

	$id = $_GET['id'];
	$judul = $_GET['judul'];
	$tanggal_kembali = $_GET['tanggal_kembali'];
	$lambat = $_GET['lambat'];

	if ($lambat >0) 
	{
	?>
	<script type="text/javascript">
		alert("Buku gagal diperpanjang karena lebih dari 7 hari peminjaman. Silakan registrasi ulang dan bayar denda");
		window.location.href="transaksi.php";
	</script>
	<?php
	}else 
	{
		$tanggal_kembali_pecah = explode("-",$tanggal_kembali); 
		$next_7_hari = mktime(0,0,0, $tanggal_kembali_pecah[1],$tanggal_kembali_pecah[2]+7,$tanggal_kembali_pecah[0]);
		$hari_next = date("Y-m-d", $next_7_hari );
			
		$sql = $koneksi->query("update t_transaksi set tanggal_kembali='$hari_next' where id='$id'");
		
			if($sql)		
			{
	?>
	<script type="text/javascript">
		alert("Perpanjangan Berhasil");
		window.location.href="transaksi.php";
	</script>	
		<?php
			}else
			{
		?>
	<script type="text/javascript">
		alert("Perpanjangan Gagal");
		window.location.href="transaksi.php";
	</script>
<?php
}}
?>