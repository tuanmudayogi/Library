

	   
  
                        
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <h4>Besaran Denda</h4>
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
                                            <th>Besaran Denda</th>
                                          
											
											<th>Aksi</th>
                                        </tr>
                                    </thead>
									
						<tbody>
							
						<?php 
						include "../program/koneksi.php";
									
									$no = 1;
									$sql = $koneksi->query("select * from tb_denda");
									while ($data = $sql->fetch_assoc()) {
									
									
										
									?>
						
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['denda']; ?></td>
					
							
							<td>
							
							
							<a href="?page=denda&aksi=ubah&id=<?php echo $data['id'] ?>" class="btn btn-success" >Ubah</a>
						
							</td>
							
						</td>
						</tr>
									<?php }?>

										   </tbody>
                                </table>
								
								
								</div> 
								
								
								</section>
								</section>
								
								