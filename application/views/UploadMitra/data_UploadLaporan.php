<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Laporan Mitra</h5>
			<div class="col-4">
				<?= $this->session->flashdata('pesan'); ?>
			</div>
		
	    </div>
		<div class="card-body">
		<?php echo form_open_multipart('C_LaporanMitra/upload_file')?>
			<div class="form-group row">		       
		          <label class="col-sm-3 col-form-label">Pilih PA</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="id" id="id" required="">
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihproject" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
				</div>
		

		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Masukan File PDF</label>
		          <div class="col-sm-9 custom-file">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="berkas[]">
									<label class="custom-file-label" for="inputGroupFile01">Klik Disini</label>
								</div>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Masukan File GDB</label>
		          <div class="col-sm-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="berkas[]">
									<label class="custom-file-label" for="inputGroupFile01">Klik Disini</label>
								</div>
		          </div>
						</div>
						<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Masukan File BOM</label>
		          <div class="col-sm-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="berkas[]">
									<label class="custom-file-label" for="inputGroupFile01">Klik Disini</label>
								</div>
		          </div>
		        </div>
		      

				<div class="card-footer">
				  <!-- <div class="form-group row"> -->
					<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
					<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
				</div>
				<?php echo form_close()?>
	    </div>
			<!-- </div> -->
  </div>
  <!-- End Card -->

<!-- Modal customer-->
<div class="modal fade" id="pilihproject" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  		<div class="table-responsive">
				<!-- <?php print_r($row->result()) ?> -->
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
										<th>Project ID</th>
										<th>Nama Customer</th>				
										<th>Alamat Terminating</th>
										<th> Pilih File</th>			  
						</tr>
					</thead>
					<tbody>
						<?php foreach ($row->result() as $key => $data)  {?>
							<tr>
								<td><?=$data->project_id?></a></td>
								<td><?=$data->nama_customer?></td>
								<td><?=$data->jalan_ter,', ',$data->kota_ter,', ',$data->provinsi_ter?></td>
								<td class="text-center" colspan="2">
									<!-- <button type="button" class="btn btn-info btn-square" data-toggle="modal" title="File Map" 
													data-target="#select_bai<?= $data->project_id;?>" data-backdrop="static" data-keyboard="false" data-id="<?=$data->project_id?>">
															<i class="fas fa-file-pdf"></i> Pilih
									</button>		 -->

									<button class="btn btn-info" id="select" data-project_id="<?= $data->project_id?>">Pilih
									</button>
								</td>
										
									
							</tr>
									
						<?php } ?>
					</tbody>
				</table>
			</div>
      </div>
    </div>
  </div>
</div>





</div>



<script type="text/javascript">

  $(document).ready(function() {
    $(document).on('click', '#select', function() {
     
      var project_id = $(this).data('project_id');
      
   
      $('#id').val(project_id);
     
      $('#pilihproject').modal('hide');
    })
	

  })
  $( function() {
		$( "#tanggal" ).datepicker({
			"dateFormat" : "yy-mm-dd"
			});
		$( "#tgl_akhir" ).datepicker({
			"dateFormat" : "yy-mm-dd"
			});
	});
</script>

