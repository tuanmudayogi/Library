

    
    <div class="panel panel-default">
	<div class="panel-heading">
	Tambah Lokasi Buku
	</div>

	<div class="panel-body">
	<div class="row">
	<div class="col-md-12">
	 
                            
							
							
							<div class="body">
							
							<form method="POST">
							
							<label for="">Lokasi Buku</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="lokasi" class="form-control" />
                          	 
								</div>
                            </div>
							

									 
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								
								$lokasi= $_POST['lokasi'];
							
								
								$sql = $koneksi->query("insert into tb_lokasibuku (lokasi) values('$lokasi')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=lokasibuku";
										</script>
										
										<?php
								}
							}
							?>
										
								
										
										
								
								
								
								
								
