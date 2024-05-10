<?php

    //koneksi database
    $_server="localhost";
    $_user="root";
    $password="";
    $database="perpustakaan";

    //buat koneksi
    $koneksi = mysqli_connect($_server, $_user, $password, $database) or die(mysqli_error($koneksi));
    ?>