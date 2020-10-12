<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Master alamat</h1>
      <p class="mb-4">Data Semua Alamat yang aktif</p>
    </div>
    <div class="col-4">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  <hr>
  </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="row card-header col-12 mx-auto">
      <div class="col-10 p-0 p-2">
        <h5 class="m-0 font-weight-bold text-primary">Data alamat</h5>
      </div>
      <div class="col-2 p-0">
        <a href="<?= site_url('master_alamat/add')?>" class="btn btn-success btn-block" id="btn">
        <i class="fas fa-user-plus"></i> Add alamat
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
						  <th>No</th>
							<!-- <th>ID</th> -->
							<th>Customer</th>
              <th>Jalan</th>
              <th>Kota</th>
              <th>Provinsi</th>
              <th>Negara</th>
              <th>Koordinat</th>
              <th>Type</th>
							<th>PIC</th>
							<th>No Telp</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
            <tr class="text-center">
						  <th>No</th>
							<!-- <th>ID</th> -->
							<th>Customer</th>
						  <th>Jalan</th>
              <th>Kota</th>
              <th>Provinsi</th>
              <th>Negara</th>
              <th>Koordinat</th>
              <th>Type</th>
							<th>PIC</th>
							<th>No Telp</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$no++;?></td>
							<!-- <td><?=$data->alamat_id?></td> -->
							<td><?=$data->nama_customer?></td>
              <td><?=$data->jalan?></td>
              <td><?=$data->kota?></td>
              <td><?=$data->provinsi?></td>
							<td><?=$data->negara?></td> 
							<td><?=$data->koordinat?></td>
							<td>
								<?php if ($data->type == 0) {
                  echo "HO";
                } else if($data->type == 1) {
                  echo "Originating";
                } else if($data->type == 2) {
									echo "Terminating";
								}
								?>
							</td>                             
              <td><?=$data->kontak?></td>              
              <td><?=$data->no_telp?></td>              
              <td class="text-center" colspan="2">
                <a href="<?= site_url('master_alamat/edit/'.$data->alamat_id)?>" class="btn btn-warning btn-circle">
                    <i class="fas fa-user-edit"></i>
                </a>
                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->alamat_id;?>" data-backdrop="static" data-keyboard="false">
                    <i class="fas fa-user-times"></i>
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
<!-- /.container-fluid -->

<!-- Modal Hapus Data-->
<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; ?>
<div class="modal fade" id="hapus_modal<?=$data->alamat_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('master_alamat/hapus_data'); ?>
        <input type="hidden" id="id" name="id" value="<?=$data->alamat_id?>">
        <p>Anda akan menghapus data "<?=$data->jalan ?>"</p>
      </div>	
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-danger" type="submit">Hapus</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Akhir Modal Hapus Data -->

<!-- Modal customer-->
<div class="modal fade" id="pilihcustomer" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable1" cellspacing="0">
              <thead>
              <tr>
                <th>ID</th>
                <th>Nama Customer</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($rowcustomer->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->customer_id?></td>
                <td><?=$data->nama_customer?></td>
                <td class="text-center">
                <button class="btn btn-info" id="select"
                data-id="<?= $data->customer_id?>" 
                data-nama="<?= $data->nama_customer?>"
                data-pilih="<?= $data->nama_customer?>">Pilih
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


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var customer_id = $(this).data('id');
      var nama_customer = $(this).data('nama');
      $('#customer_id').val(customer_id);
      $('#nama_customer').val(nama_customer);
      $('#pilihcustomer').modal('hide');
    })
  })
</script>
<!-- Akhir Modal customer Data -->

