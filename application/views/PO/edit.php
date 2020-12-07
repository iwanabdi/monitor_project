<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Edit PO </h5>
				<div class="right">
					<a href="<?= site_url('PO')?>" class="btn btn-warning">
					<i class="fas fa-undo-alt"></i> Back
					</a>
				</div>
	    </div>
    	<form action="<?= site_url('PO/edit_po')?>" method="POST">
	    	<div class="card-body">
				<div class="form-group row">
		          <label class="col-sm-3 col-form-label">No Purchase Order </label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="po_no" id="po_no" readonly value="<?=$po->po_no?>" required>
		            </div>
		          </div>
				</div>	
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Mitra </label>
		          <div class="col-sm-9">
		            <div class="input-group">
                        <input type="hidden" class="form-control" name="mitra_id" id="mitra_id" readonly value="<?=$po->mitra_id?>" required>    
		                <input type="text" class="form-control" name="mitrapr" id="mitrapr" readonly value="<?=$po->mitrapr?>" required>
		            </div>
		          </div>
				</div>	
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">IO Number</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="IO" id="IO" value="<?=$po->io_number?>" readonly required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Project ID</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="project_id" id="project_id" value="<?=$po->project_name?>" readonly required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Delivery Date</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="date" class="form-control" name="devdate" id="devdate" value="<?=$po->devdate_pr?>" required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
				<label class="col-sm-3 col-form-label">Pekerjaan dan Qty</label>
					<div class="col-sm-9">
						<table class="table ml-auto text-gray-800" id="tableLoop">
							<thead>
								<tr>
									<!-- <th class="text-center">No</th> -->
									<th class="text-center">Pekerjaan</th>
                                    <!-- <th class="text-center"></th> -->
									<th class="text-center">QTY</th>
									<th width="200px"><button type="button" class="btn btn-info btn-block" id="add_material"><i class="fas fa-plus-circle"></i> Add Pekerjaan</button></th>
								</tr>
							</thead>
							<tbody>
                            <?php
                            foreach ($dpo->result() as $key => $data)  {
                                // var_dump($data);
                                ?>
                                <tr>
                                    <td>
                                        <select name="pekerjaan[]" id="pekerjaan[]" class="form-control custom-select project" required>
                                            <?php foreach ($pekerjaan->result() as $key => $data1) {?>
                                                <option value="<?= $data1->pekerjaan_id;?>" 
                                                <?php if ($data->pekerjaan_id==$data1->pekerjaan_id) {?>selected <?php }?>
                                                ><?=$data1->nama_pekerjaan;?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                    <td class="text-center"><input type="number" name="qty[]" id="qty[]" class="form-control" required value=<?=$data->qty;?>></td>
                                    <td class="text-center"> <button type="button" class="btn btn-sm btn-danger" id="HapusBaris" title="Hapus Baris"><i class="fas fa-times-circle"></i></button></td>
                                </tr>
                            <?php } ?>
                            </tbody>
						</table>
					</div>
	    	    </div>
            </div>
	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Edit</button>
				<button type="reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>
			<!-- </div> -->
    	</form>
  </div>
  <!-- End Card -->

</div>
<!-- End Container -->

<!-- JAVASCRIPT TAIL SELECT -->
<script src="https://cdnjs.cloudflare.com/ajax//libs//popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?= base_url();?>assets/tail.select/js/tail.select-full.js"></script>

<script type="text/javascript">

	$(document).ready(function () {
		$('#add_material').click(function (e) {
			e.preventDefault();
			add_project();
		});
	});

	function add_project()
	{
		var No = $("#tableLoop tbody tr").length+1;
		var Baris = '<tr>';
				Baris += '<td>';
				Baris += '<select name="pekerjaan[]" id="pekerjaan[]" class="form-control custom-select project" required>\
								<option selected disabled value="">--Pilih Pekerjaan--</option>\
								<?php foreach ($pekerjaan->result() as $key => $data) {?>\
									<option value="<?= $data->pekerjaan_id;?>"><?=$data->nama_pekerjaan;?></option>\
								<?php }?>\
							</select>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<input type="number" name="qty[]" id="qty[]" class="form-control" required>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<button type="button" class="btn btn-sm btn-danger" id="HapusBaris" title="Hapus Baris"><i class="fas fa-times-circle"></i></button>';
				Baris += '</td>';
			Baris += '</tr>';

		$("#tableLoop tbody").append(Baris);
	}

	$(document).on('click', '#HapusBaris', function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
	});

</script>
