

	   
  
                        
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <h4>Lokasi Buku</h4>
                        </div>
                        <div class="panel-body">
						<div class="row">
						<div class="col-md-12">
						<div class="content-panel">
	 

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="anggota">
								
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Lokasi Buku</th>
                                          
											
											<th>Aksi</th>
                                        </tr>
                                    </thead>
									
						<tbody>
							
						<?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from tb_lokasibuku");
									while ($data = $sql->fetch_assoc()) {
									
									
										
									?>
						
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['lokasi']; ?></td>
					
							
							<td>
							
							
							<!--<a href="?page=anggota&aksi=ubahanggota&id=<?php echo $data['lokasi'] ?>" class="btn btn-success" >Ubah</a>-->
							<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=anggota&aksi=hapusanggota&id=<?php echo $data['nis'] ?>" class="btn btn-danger" >Hapus</a>
							</td>
							
						</td>
						</tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="?page=lokasibuku&aksi=tambahrak" class="btn btn-primary" >Tambah</a>
							
								
								</div> 
								
								
								</section>
								</section>
								
								