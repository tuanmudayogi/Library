<?php 
    include "koneksi.php";

    $id = $_GET['id'];
    $judul = $_GET['judul'];
    $lambat = $_GET['lambat'];
    $denda = $_GET['denda'];

    $sql = $koneksi->query("update t_transaksi set status='Kembali', lambat='$lambat', denda='$denda' where id='$id'");
    $sql = $koneksi->query("update t_buku set jumlah_buku=(jumlah_buku + 1) where judul='$judul'");
?>

<script type="text/javascript">
    alert("Proses Kembalikan Buku Berhasil");
    window.location.href="kembalibuku.php";
</script>