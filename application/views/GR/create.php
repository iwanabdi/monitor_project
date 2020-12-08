<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Create GR </h5>
				<div class="right">
					<a href="<?= site_url('GR')?>" class="btn btn-warning">
					<i class="fas fa-undo-alt"></i> Back
					</a>
				</div>
	    </div>
    	<form action="<?= site_url('GR/buat_gr')?>" method="POST">
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
		          <label class="col-sm-3 col-form-label">Keterangan</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="keterangan" id="keterangan" readonly value="<?=$po->project_name?>" required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Good Receipt Date</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="date" class="form-control" name="grdate" id="grdate" required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
				<label class="col-sm-3 col-form-label">Pekerjaan dan Qty</label>
					<div class="col-sm-9">
						<table class="table ml-auto text-gray-800" id="tableLoop">
							<thead>
								<tr>
									<th class="text-center">Pekerjaan</th>
									<th class="text-center">QTY</th>
                                    <th class="text-center">Unit / Price</th>
                                    <th class="text-center">Total Price</th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach ($dpo->result() as $key => $data)  {
                                // var_dump($data);
                                ?>
                                <tr>
                                    <td class="text-center">
                                    <input type="hidden" name="pekerjaan[]" id="pekerjaan[]" class="form-control" required readonly value=<?=$data->pekerjaan_id;?>>
                                    <input type="text" class="form-control" required readonly value=<?=$data->nama_pekerjaan;?>>
                                    </td>
                                    <td class="text-center"><input type="number" name="qty[]" id="qty[]" class="form-control" required readonly value=<?=$data->qty;?>></td>
                                    <td class="text-center"><input type="number" name="uprice[]" id="uprice[]" class="form-control" required readonly value=<?=$data->price;?>></td>
                                    <td class="text-center"><input type="number" name="tprice[]" id="tprice[]" class="form-control" required readonly value=<?=$data->total;?>></td>
                                </tr>
                            <?php } ?>
                            </tbody>
						</table>
					</div>
	    	    </div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Total Value</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="number" class="form-control" name="totval" id="totval" readonly value="<?=$po->net_price?>"  required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Diskon %</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="number" class="form-control" name="diskon" id="diskon" required max="5" min="0">
		            </div>
		          </div>
				</div>
            </div>
	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Create</button>
			</div>
			<!-- </div> -->
    	</form>
  </div>
  <!-- End Card -->

</div>
<!-- End Container -->