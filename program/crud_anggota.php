<?php

//panggil koneksi database
include "koneksi.php";

//uji jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {

    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO t_anggota (kode_anggota, nis, nama, alamat, kelas)
                                      VALUES    ('$_POST[tkodeanggota]',
                                                 '$_POST[tnis]',
                                                 '$_POST[tnama]',
                                                 '$_POST[talamat]',
                                                 '$_POST[tkelas]') ");
    //jika simpan sukses
    if($simpan) {
        echo "<script>
                alert('Simpan data sukses!');
                document.location='anggota.php';
              </script>";
    } else {
        echo "<script>
                alert('Simpan data gagal!');
                document.location='anggota.php';
              </script>";
    }
}

if (isset($_POST['bubah'])) {

  //persiapan ubah data
  $ubah = mysqli_query($koneksi, "UPDATE t_anggota SET
                                                  kode_anggota  = '$_POST[tkodeanggota]',
                                                  nis = '$_POST[tnis]',
                                                  nama = '$_POST[tnama]',
                                                  alamat = '$_POST[talamat]',
                                                  kelas = '$_POST[tkelas]'
                                                WHERE id_anggota = '$_POST[id_anggota]'
                                                  ");



  //jika simpan sukses
  if($ubah) {
      echo "<script>
              alert('Ubah data sukses!');
              document.location='anggota.php';
            </script>";
  } else {
      echo "<script>
              alert('Ubah data gagal!');
              document.location='anggota.php';
            </script>";
  }
}


//uji jika hapus di klik
if (isset($_POST['bhapus'])) {

  //persiapan hapus baru
  $hapus = mysqli_query($koneksi, "DELETE FROM t_anggota WHERE id_anggota = '$_POST[id_anggota]' ");

  //jika hapus sukses
  if($hapus) {
      echo "<script>
              alert('Hapus data sukses!');
              document.location='anggota.php';
            </script>";
  } else {
      echo "<script>
              alert('Hapus data gagal!');
              document.location='anggota.php';
            </script>";
  }
}