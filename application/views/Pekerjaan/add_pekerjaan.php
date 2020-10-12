<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah Pekerjaan</h5>
			<div class="right">
				<a href="<?= site_url('master_pekerjaan')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_pekerjaan/proses_add_data')?>" method="POST">
	    	<div class="card-body">
	    		<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nama Pekerjaan</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" required="" autofocus="">
		          </div>
		        </div>
				 <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Satuan</label>
		          <div class="col-sm-9">
		            <select name="satuan" id="satuan" class="form-control custom-select" required>
		              <option selected disabled value="">--Pilih Satuan--</option>
		              <option value="CM">CM</option>
		              <option value="M">M</option>
		              <option value="KM">KM</option>
		            </select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Price</label>
		          <div class="col-sm-9">
		            <input type="tel" min="0" maxlength="13" oninput="validAngka(this)" class="form-control" name="price" id="price" required >
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Create By</label>
		          <div class="col-sm-9">
		            <input type="text" name="create_by" class="form-control" id="pegawai_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
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
