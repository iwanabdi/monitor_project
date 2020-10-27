<!-- Begin Page Content -->
<div class="container-fluid">
  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah Pegawai</h5>
			<div class="right">
				<a href="<?= site_url('master_pegawai')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_pegawai/proses_add_data')?>" method="POST">
	    	<div class="card-body">
	    		<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" autofocus="" id="nama_pegawai" name="nama_pegawai" required="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">No Telepon</label>
		          <div class="col-sm-9">
		            <input type="tel" min="0" maxlength="14" oninput="validAngka(this)" class="form-control" name="no_telp" id="no_telp" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Email</label>
		          <div class="col-sm-9">
					<input type="email" class="form-control" name="email" id="email" required>
				  </div>
		        </div>
				<div class="form-group row">
		          <label class="col-sm-3 col-form-label">No Telepon</label>	
		          <div class="col-sm-9">
		            <input type="password" class="form-control" name="password" id="password" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Jabatan</label>
		          <div class="col-sm-9">
		            <select name="jabatan" id="jabatan" class="form-control custom-select" required>
		              <option selected disabled value="">--Pilih Jabatan--</option>
		              <option value="0">SPV</option>
		              <option value="1">PM</option>
		              <option value="2">Admin</option>
		              <option value="3">Gudang</option>
		              <option value="4">QC</option>
		              <?php if ($this->session->userdata('jabatan') == -1):?>
		                <option value="-1">Developer</option>
		              <?php endif ?>
		            </select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Create By</label>
		          <div class="col-sm-9">
		            <input type="text" name="create_by" class="form-control" id="pegawai_id" 
		            value="<?= $this->session->userdata('nama_pegawai');?>" disabled="">
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
	<?= $this->session->flashdata('msg_email');?>
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
