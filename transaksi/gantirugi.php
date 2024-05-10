<?php 
    include "koneksi.php";

    $id = $_GET['id'];
    $sql = $koneksi->query("update t_transaksi set status='Lunas' where id='$id'");
?>

<script type="text/javascript">
    alert("Proses Ganti Rugi Buku Berhasil");
    window.location.href="gantirugibuku.php";
</script>
		
		