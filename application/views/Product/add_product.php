<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah Product</h5>
			<div class="right">
				<a href="<?= site_url('master_product')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_product/proses_add_data')?>" method="POST">
	    	<div class="card-body">
	    		<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nama Product</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" autofocus="" id="nama_product" name="nama_product" required="" autofocus="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Bandwith</label>
		          <div class="col-sm-9">
		            <input type="text" min="0" maxlength="14" oninput="validAngka(this)" class="form-control" id="bandwith" name="bandwith" required="">
		          </div>
		        </div>
				 <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Satuan</label>
		          <div class="col-sm-9">
		            <select name="satuan" id="satuan" class="form-control custom-select" required>
		              <option selected disabled value="">--Pilih Satuan--</option>
		              <option value="Kbps">Kbps</option>
		              <option value="Mbps">Mbps</option>
		              <option value="Gbps">Gbps</option>
		            </select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Create By</label>
		          <div class="col-sm-9">
		            <input type="text" name="create_by" class="form-control" id="product_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled>
		          </div>
		        </div>
	    	</div>
	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
				<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>
			<!-- </div> -->
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
