<?php

//panggil koneksi database
include "koneksi.php";

//uji jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {

    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO t_buku (kode_buku, judul, id_penulis, id_penerbit, id_kategori, tahun_terbit, jumlah_buku, lokasi )
                                      VALUES    ('$_POST[tkode]',
                                                 '$_POST[tjudul]',
                                                 '$_POST[tpenulis]',
                                                 '$_POST[tpenerbit]',
                                                 '$_POST[tkategori]',
                                                 '$_POST[ttahun]',
                                                 '$_POST[tjumlah]',
                                                 '$_POST[tlokasi]')");
    //jika simpan sukses
    if($simpan) {
        echo "<script>
                alert('Simpan data sukses!');
                document.location='buku.php';
              </script>";
    } else {
        echo "<script>
                alert('Simpan data gagal!');
                document.location='buku.php';
              </script>";
    }
}

if (isset($_POST['bubah'])) {

  //persiapan ubah data
  $ubah = mysqli_query($koneksi, "UPDATE t_buku SET
                                                  kode_buku  = '$_POST[tkode]',
                                                  judul = '$_POST[tjudul]',
                                                  id_penulis = '$_POST[tpenulis]',
                                                  id_penerbit = '$_POST[tpenerbit]',
                                                  id_kategori = '$_POST[tkategori]',
                                                  tahun_terbit = '$_POST[ttahun]',
                                                  jumlah_buku = '$_POST[tjumlah]',
                                                  lokasi = '$_POST[tlokasi]'
                                                WHERE id_buku = '$_POST[id_buku]'
                                                  ");



  //jika simpan sukses
  if($ubah) {
      echo "<script>
              alert('Ubah data sukses!');
              document.location='buku.php';
            </script>";
  } else {
      echo "<script>
              alert('Ubah data gagal!');
              document.location='buku.php';
            </script>";
  }
}


//uji jika hapus di klik
if (isset($_POST['bhapus'])) {

  //persiapan hapus baru
  $hapus = mysqli_query($koneksi, "DELETE FROM t_buku WHERE id_buku = '$_POST[id_buku]' ");

  //jika hapus sukses
  if($hapus) {
      echo "<script>
              alert('Hapus data sukses!');
              document.location='buku.php';
            </script>";
  } else {
      echo "<script>
              alert('Hapus data gagal!');
              document.location='buku.php';
            </script>";
  }
}