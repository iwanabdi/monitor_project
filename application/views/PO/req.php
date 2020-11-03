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
		                <input type="text" class="form-control" name="customer_name" id="customer_name" value="<?=$project->nama_customer?>" readonly required>
					</div>
				  </div>
				</div>	
                <div class="form-group row">
				  <label class="col-sm-3 col-form-label">Mitra</label>
		          <div class="col-sm-9">
		            <div class="input-group">
                        <input type="hidden" class="form-control" name="mitra_id" id="mitra_id" value="<?php if($mitraterpilih !=null){echo $mitraterpilih->mitra_id;} else {echo "";}?>" readonly required>    
		                <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" value="<?php if($mitraterpilih !=null){echo $mitraterpilih->nama_mitra;} else {echo "";}?>" readonly required>
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
					$('.qty').val('');
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