<!-- Begin Page Content -->
<div class="container-fluid">
<?= $this->session->flashdata('pesan')?>
  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah Material</h5>
			<div class="right">
				<a href="<?= site_url('master_material')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_material/proses_add_data')?>" method="POST">
	    	<div class="card-body">
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nama Material</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="nama_material" name="nama_material" required autofocus>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Brand</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="brand" id="brand" required>
		          </div>
				</div>
				<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Storage</label>
		          <div class="col-sm-9">
		          	<select name="storage_bin" id="storage_bin" class="form-control custom-select project" onchange="ketik()" required="">
						<option selected="" disabled="" value="">-- Pilih Satuan Material --</option>
							<option value="1">Unit</option>
							<option value="2">Roll (1000 Unit)</option>
							<option value="3">Drum (4000 Unit)</option>
					</select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Keterangan</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Stok</label>
		          <div class="col-sm-9">
		            <input type="number" oninput="validAngka(this)" class="form-control" name="stok" id="stok" required>
		            <input type="hidden" class="form-control" name="stok_roll" id="stok_roll" value="">
		            <input type="hidden" class="form-control" name="stok_drum" id="stok_drum" value="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Create By</label required>
		          <div class="col-sm-9">
		            <input type="text" name="create_by" class="form-control" id="pegawai_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
		          </div>
				</div>
				<hr>
				<div id="cetak">
					
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
var stat = 0;
function validAngka(a)
{
    if(!/^[0-9.]+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000);
    }
    ketik();
}

function ketik()
{
	var stat = $('.project option:selected').val();
	var x = document.getElementById("stok").value;
	var text = "";
	var head = "<div class='form-group row'>";
	var label = "<label class='col-sm-3 col-form-label'>SN - ";
	var input = "<div class='col-sm-9'>\
		            <input type='text' class='form-control' id='sn' required='' ";
	var tutup = ">\
				</div>";
	if (stat == 1) {
		for (let i = 1; i <= x; i++) {
			text += head + label + i + "</label>" + input + "name='sn-" + i+"'" + tutup + "</div>";
		}
	}else if(stat == 2){
		x = x / 1000;
		$('#stok').attr('min', '1000');
		$('#stok_roll').val(x);
		for (let i = 1; i <= x; i++) {
			text += head + label + i + "</label>" + input + "name='sn-" + i+"'" + tutup + "</div>";
		}
	}else if(stat == 3){
		x = x / 4000;
		$('#stok').attr('min', '4000');
		$('#stok_drum').val(x);
		for (let i = 1; i <= x; i++) {
			text += head + label + i + "</label>" + input + "name='sn-" + i+"'" + tutup + "</div>";
		}
	}
	document.getElementById("cetak").innerHTML = text;
}
</script>
