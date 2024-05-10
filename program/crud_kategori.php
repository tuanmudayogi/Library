<?php

//panggil koneksi database
include "koneksi.php";

//uji jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {

    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO t_kategori (kode_kategori, nama_kategori)
                                      VALUES    ('$_POST[tkodekategori]',
                                                 '$_POST[tnamakategori]') ");
    //jika simpan sukses
    if($simpan) {
        echo "<script>
                alert('Simpan data sukses!');
                document.location='kategori.php';
              </script>";
    } else {
        echo "<script>
                alert('Simpan data gagal!');
                document.location='kategori.php';
              </script>";
    }
}

if (isset($_POST['bubah'])) {

  //persiapan ubah data
  $ubah = mysqli_query($koneksi, "UPDATE t_kategori SET
                                                  kode_kategori  = '$_POST[tkodekategori]',
                                                  nama_kategori = '$_POST[tnamakategori]'
                                                WHERE id_kategori = '$_POST[id_kategori]'
                                                  ");



  //jika simpan sukses
  if($ubah) {
      echo "<script>
              alert('Ubah data sukses!');
              document.location='kategori.php';
            </script>";
  } else {
      echo "<script>
              alert('Ubah data gagal!');
              document.location='kategori.php';
            </script>";
  }
}


//uji jika hapus di klik
if (isset($_POST['bhapus'])) {

  //persiapan hapus baru
  $hapus = mysqli_query($koneksi, "DELETE FROM t_kategori WHERE id_kategori = '$_POST[id_kategori]' ");

  //jika hapus sukses
  if($hapus) {
      echo "<script>
              alert('Hapus data sukses!');
              document.location='kategori.php';
            </script>";
  } else {
      echo "<script>
              alert('Hapus data gagal!');
              document.location='kategori.php';
            </script>";
  }
}