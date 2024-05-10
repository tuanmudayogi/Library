<?php
include "../program/koneksi.php";
 $id = $_GET['id'];
 $sql = $koneksi->query("select * from tb_denda where id = '$id'");
 $tampil = $sql->fetch_assoc();

  $denda = $tampil['denda'];

 ?>
 
 <div class="panel panel-default">
	<div class="panel-heading">
	Ubah Denda
	</div>

	<div class="panel-body">
	<div class="row">
	<div class="col-md-12">
							
							
							<div class="body">
							
							<form method="POST">
							
							<label for="">Besar Denda</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="denda" value="<?php echo $tampil['denda'];?>" class="form-control" />
                          	 
								</div>
                            </div>
							
							
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							
							
							
						<?php
							
							if (isset($_POST['simpan'])) {
								
								$denda= $_POST['denda'];
								
								
								$sql2 = $koneksi->query("update tb_denda set denda='$denda' where id='$id'");
								
								if ($sql2) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="denda.php";
										</script>
										
										<?php
								}
							}
							?>
										
										
										
								
								
								
								
								
