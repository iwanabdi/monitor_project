<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Edit Product</h5>
			<div class="right">
				<a href="<?= site_url('master_product')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_product/proses_edit_data')?>" method="POST">
	    	<div class="card-body">
	    		<input type="hidden" id="id" name="id" value="<?= $row->product_id?>">

		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nama Product</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="nama_product" name="nama_product" required="" value="<?= $row->nama_product;?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Bandwith</label>
		          <div class="col-sm-9">
		            <input type="number" class="form-control" id="bandwith" name="bandwith" value="<?= $row->bandwith;?>" required="">
		          </div>
		        </div>
						<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Satuan</label>
		          <div class="col-sm-9">
		            <select name="satuan" id="satuan" class="form-control custom-select">
		              <option value="Kbps" <?php if ($row->satuan == 'Kbps'): ?>
		                selected
		              <?php endif ?>>Kbps      
		              </option>
		              <option value="Mbps" <?php if ($row->satuan == 'Mbps'): ?>
		                selected
		              <?php endif ?>>Mbps
		              </option>
		              <option value="Gbps" <?php if ($row->satuan == 'Gbps'): ?>
		                selected
		              <?php endif ?>>Gbps
		              </option>
		            </select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Update By</label>
		          <div class="col-sm-9">
		            <input type="text" name="update_by" class="form-control" id="product_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
		          </div>
		        </div>

	    	</div>

	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
				<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>

	    </form>
	</div>
</div>

<script language='javascript'>
function validAngka(a)
{
    if(!/^[0-9.]+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000);
    }
}
</script>