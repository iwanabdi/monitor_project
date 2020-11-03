<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Request PO</h5>
			<div class="right">
				<div id="notif"></div>
			</div>
	    </div>
    	<form action="<?= site_url('PO/req_po')?>" method="POST" id="SimpanData">
	    	<div class="card-body">
				<!-- row pilih mitra -->
		        <div class="form-group row">
				  <label class="col-sm-3 col-form-label">ID Project</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		                <input type="text" class="form-control" name="project_id" id="project_id" value="<?=$project->project_id?>" readonly required>
					</div>
				  </div>
				</div>	
                <div class="form-group row">
				  <label class="col-sm-3 col-form-label">Customer</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		                <input type="text" class="form-control" name="curtomer_name" id="curtomer_name" value="<?=$project->nama_customer?>" readonly required>
					</div>
				  </div>
				</div>	
                <div class="form-group row">
				  <label class="col-sm-3 col-form-label">Mitra</label>
		          <div class="col-sm-9">
		            <div class="input-group">
                        <input type="hidden" class="form-control" name="mitra_id" id="mitra_id" value="<?=$mitraterpilih->mitra_id?>" readonly required>    
		                <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" value="<?=$mitraterpilih->nama_mitra?>" readonly required>
					</div>
				  </div>
				</div>	
                <div class="form-group row">
				  <label class="col-sm-3 col-form-label">IO Number</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		                <input type="text" class="form-control" name="io" id="io" value="<?=$project->IO?>" readonly required>
					</div>
				  </div>
				</div>	
                <div class="form-group row">
				  <label class="col-sm-3 col-form-label">Delivery Date</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		                <input type="date" class="form-control" name="devdate" id="devdate" required>
					</div>
				  </div>
				</div>	
				<!-- akhir row -->

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Pekerjaan dan QTY</label>
					<div class="col-sm-9">
						<table class="table ml-auto text-gray-800" id="tableLoop">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Pekerjaan</th>
									<th class="text-center">QTY</th>
									<th width="200px"><button type="button" class="btn btn-info btn-block" id="add_project"><i class="fas fa-plus-circle"></i> Add Project</button></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
	    	</div>
			<div class="card-footer">
			<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
			</div>
    	</form>
  </div>
  <!-- End Card -->

</div>



<!-- -------------------------------------------------------------------------------------------------------------------->
<!-- Modal Mitra -->

<div class="modal fade" id="pilihmitra" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Mitra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable1" cellspacing="0">
              <thead>
              <tr class="text-center">
                <th>ID</th>
                <th>Nama Mitra</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
			<?php
              foreach($mitra->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->mitra_id?></td>
                <td><?=$data->nama_mitra?></td>
                <td class="text-center">
					<button class="btn btn-info" id="select"
					data-id="<?= $data->mitra_id?>" 
					data-nama="<?= $data->nama_mitra?>"
					data-pilih="<?= $data->nama_mitra?>">Pilih
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
      let mitra_id = $(this).data('id');
      let nama_mitra = $(this).data('nama');
      $('#mitra_id').val(mitra_id);
      $('#nama_mitra').val(nama_mitra);
      $('#pilihmitra').modal('hide');
    });
  });
</script>
<!-- akhir modal mitra -->


<!-- -------------------------------------------------------------------------------------------------------------------->

<!-- JAVASCRIPT TAIL SELECT -->
<script src="https://cdnjs.cloudflare.com/ajax//libs//popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?= base_url();?>assets/tail.select/js/tail.select-full.js"></script>

<script type="text/javascript">

	$(document).ready(function () {
		for(i=1; i<=1; i++){
			add_project();
		}
		$('#add_project').click(function (e) {
			e.preventDefault();
			add_project();
		});

	});

	function add_project()
	{
		// $(document).ready(function() {
		// 	$('[data-toggle="tooltip"]').tooltip();
		// });
		var No = $("#tableLoop tbody tr").length+1;
		var Baris = '<tr>';
				Baris += '<td  class="text-center">'+No+'</td>';
				Baris += '<td>';
					Baris += '<select name="project[]" id="project[]" class="form-control custom-select project" required>\
									<option selected disabled value="">--Pilih Project--</option>\
									<?php foreach ($pekerjaan->result() as $key => $data) {?>\
										<option value="<?= $data->pekerjaan_id;?>""><?=$data->nama_pekerjaan;?></option>\
									<?php }?>\
								</select>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<input type="number" name="qty[]" id="qty[]" class="form-control tgl_stg" required>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<button type="button" class="btn btn-sm btn-danger" id="HapusBaris" title="Hapus Baris"><i class="fas fa-times-circle"></i></button>';
				Baris += '</td>';
			Baris += '</tr>';

		$("#tableLoop tbody").append(Baris);
		$("#tableLoop tbody tr").each(function(){
			$(this).find('td:nth-child(2) select').focus();
		});
	}

	$(document).on('click', '#HapusBaris', function(e) {
		e.preventDefault();
		var No = 1;
		$(this).parent().parent().remove();
		$('tableLoop tbody tr').each(function() {
			$(this).find('td:nth-child(1)').html(No);
			No++;
		});
	});

	$(document).ready(function () {
		$("#SimpanData").submit(function (e) {
			e.preventDefault();
			stg();
		});
	});

	function stg() {
		$.ajax({
			url: $("#SimpanData").attr('action'),
			type: 'POST',
			cache: false,
			dataType: "json",
			data: $("#SimpanData").serialize(),
			success:function(data){
				if (data.success == true) {
					$('.project').val('');
					$('.tgl_stg').val('');
					$('#notif').fadeIn(800, function () {
						$('#notif').html(data.notif).fadeOut(5000).delay(800);
					});
				}
				else{
					$('#notif').html('<div class="alert alert-danger">Surat Tugas Gagal Dibuat</div>')
				}
			},
			error:function(error) {
				alert(error);
			}
		})
	}

</script>