<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah Stok</h5>
			<div class="right">
				<a href="<?= site_url('master_material')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_material/proses_edit_data')?>" method="POST">
	    	<div class="card-body">

	    		<input type="hidden" id="id" name="id" value="<?= $row->material_id?>">
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Stok</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="stok" id="stok" value="<?= $row->stok;?>" disabled>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Tambah Stok</label>
		          <div class="col-sm-9">
		            <input type="tel" maxlength="14" oninput="validAngka(this)" autofocus="" class="form-control" name="tambah_stok" id="tambah_stok">
		          </div>
		        </div>
		        
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Update By</label>
		          <div class="col-sm-9">
		            <input type="text" name="update_by" class="form-control" id="pegawai_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
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

<script>
function myFunction(status) {
    // var x = $('#cek').val();
    status != status
      document.getElementById("password").disabled = status;
      document.getElementById("password").value = "";
    // var x = document.getElementById("password");
    // x.disabled = true;
}
</script>