<?php

//panggil koneksi database
include "koneksi.php";

//uji jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {

    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO t_penerbit (kode_penerbit, nama_penerbit)
                                      VALUES    ('$_POST[tkodepenerbit]',
                                                 '$_POST[tnamapenerbit]') ");
    //jika simpan sukses
    if($simpan) {
        echo "<script>
                alert('Simpan data sukses!');
                document.location='penerbit.php';
              </script>";
    } else {
        echo "<script>
                alert('Simpan data gagal!');
                document.location='penerbit.php';
              </script>";
    }
}

if (isset($_POST['bubah'])) {

  //persiapan ubah data
  $ubah = mysqli_query($koneksi, "UPDATE t_penerbit SET
                                                  kode_penerbit = '$_POST[tkodepenerbit]',
                                                  nama_penerbit = '$_POST[tnamapenerbit]'
                                                WHERE id_penerbit = '$_POST[id_penerbit]'
                                                  ");



  //jika edit sukses
  if($ubah) {
      echo "<script>
              alert('Ubah data sukses!');
              document.location='penerbit.php';
            </script>";
  } else {
      echo "<script>
              alert('Ubah data gagal!');
              document.location='penerbit.php';
            </script>";
  }
}


//uji jika hapus di klik
if (isset($_POST['bhapus'])) {

  //persiapan hapus baru
  $hapus = mysqli_query($koneksi, "DELETE FROM t_penerbit WHERE id_penerbit = '$_POST[id_penerbit]' ");

  //jika hapus sukses
  if($hapus) {
      echo "<script>
              alert('Hapus data sukses!');
              document.location='penerbit.php';
            </script>";
  } else {
      echo "<script>
              alert('Hapus data gagal!');
              document.location='penerbit.php';
            </script>";
  }
}