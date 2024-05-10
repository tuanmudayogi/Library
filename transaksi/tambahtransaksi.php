<div class="modal fade modal-lg" id="modaltransaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="tambahtransaksi.php">
                <div class="modal-body">
                        <div class="mb-3">


                  <?php
                    include "../program/koneksi.php";

                    $tanggal_pinjam = date("Y-m-d");
                    $tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
                    $kembali = date("Y-m-d", $tujuh_hari);
                  ?>


							<label for="">Judul Buku</label>
              <div class="form-group mb-3">
                <div class="form-line">
                  <select required="" name="buku" class="form-control" />
								    <option value="">-- Pilih Judul Buku  --</option>
								
								    <?php
                      $sql = $koneksi -> query("SELECT * FROM t_buku order by id_buku");
                      while ($data=$sql->fetch_assoc()) 
                      {
                        echo "<option value='$data[id_buku].$data[judul]'>$data[judul]</option>";
                      }
                    ?>
								  </select>  
							  </div>
                </div>
							
							  <label for="">Nama Peminjam</label>
                  <div class="form-group mb-3">
                    <div class="form-line">
                      <select required="" name="nama" class="form-control" />
								        <option value="">-- Pilih Nama Peminjam --</option>
								        
                        <?php
                          $sql = $koneksi -> query("select * from t_anggota order by nis");
                          while ($data=$sql->fetch_assoc()) 
                          {
                            echo "<option value='$data[nis].$data[nama]'>$data[nis], $data[nama]</option>";
                          }
                          ?>
								      </select>
							      </div>
                  </div>

							  <label for="">Tanggal Pinjam</label>
                  <div class="form-group mb-3">
                    <div class="form-line">
                      <input  type="date" name="tanggal_pinjam" class="form-control" id="tanggal" value="<?php echo $tanggal_pinjam; ?>" />
							      </div>
                  </div>
				
							  <label for="">Tanggal Kembali</label>
                  <div class="form-group mb-3">
                    <div class="form-line">
                      <input type="date" name="tanggal_kembali" class="form-control" id="tanggal" value="<?php echo $kembali; ?>" />
                    </div>
                  </div>
                  <hr>
							    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		
              </form>
                </div>
            </div>
            </div>

<?php
  include "../program/koneksi.php";

  if (isset($_POST['simpan'])) 
  {
    $tanggal_pinjam= $_POST['tanggal_pinjam'];
    $tanggal_kembali= $_POST['tanggal_kembali'];
    
    $buku= $_POST['buku'];
    $pecah_buku = explode(".", $buku);
  
    $id = $pecah_buku[0];
    $judul = $pecah_buku[1];
    
    $nama= $_POST['nama'];
    $pecah_nama = explode(".", $nama);
    $nis = $pecah_nama[0];
    $nama = $pecah_nama[1];
  
    $sql = mysqli_query($koneksi,"select * from t_buku where judul='$judul'");
    
    while ($data = mysqli_fetch_assoc($sql)) 
    {
      $sisa = $data['jumlah_buku'];
      
      if ($sisa <= 0) 
      {
?>
          
        <script type="text/javascript">
          alert("Stok Buku Habis, Transaksi Tidak Dapat Dilakukan, Silakan Tambah Stok Buku Terlebih Dahulu");
          window.location.href="tambahtransaksi.php";
        </script>
            
        <?php	
          }
    
          else 
          {
            $sql = $koneksi->query("insert into t_transaksi(judul, nis, nama, tanggal_pinjam, tanggal_kembali, status) values('$judul','$nis','$nama','$tanggal_pinjam','$tanggal_kembali','Pinjam')");
            $sql2 = $koneksi->query("update t_buku set jumlah_buku=(jumlah_buku-1) where id_buku='$id'");
        ?>
          
        <script type="text/javascript">
          alert("Simpan Data Berhasil");
          window.location.href="transaksi.php";
        </script>
        
        <?php
          }}}
        ?>
    <footer class="fixed-bottom">
      <foot class="footer-brand text-dark"><marquee>Copyright @ PERPUSTAKAAN SDN CICADAS BARAT 2023 - All Rights Reserved </marquee></foot>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
	
								
										
										
								
								
								
								
								
