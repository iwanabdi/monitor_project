<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Project</h1>
      <p class="mb-4">Data Semua Project</p>
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
        <h5 class="m-0 font-weight-bold text-primary">Data Project</h5>
      </div>
      <?php if ($this->session->userdata('jabatan')==0){?>
        <div class="col-2 p-0">
          <a href="<?= site_url('project/add')?>" class="btn btn-success btn-block" id="btn">
          <i class="fas fa-plus"></i> Add Project
          </a>
        </div>
      <?php }?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <?php print_r($row->result()) ?> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>Project ID</th>
              <th>Customer Name</th>
              <th>Status</th>
              <th>Aging</th>
              <th>Product</th>
              <th>IO</th>
              <th>SID</th>
              <th>Project Manager</th>
              <th>Alamat HO/Originating</th>
              <th>Alamat Terminating</th>
              <th>Create On</th>
              <?php if ($this->session->userdata('jabatan')==0) {
                echo "<th>Dispos</th>";}
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><a href="<?= site_url('project/detail/'.$data->project_id)?>"><?=$data->project_id?></a></td>
              <td><?=$data->nama_customer?></td>
              <td>
                  <?php
                    if ($data->status_project==1) {
                      echo "Disposisi";
                    }
                    else if ($data->status_project==2) {
                      echo "Survey";
                    }
                    else if ($data->status_project==3) {
                      echo "Proges";
                    }
                    else if ($data->status_project==4) {
                      echo "Testcom";
                    }
                    else if ($data->status_project==5) {
                      echo "Laporan Mitra";
                    }
                    else if ($data->status_project==6) {
                      echo "QC OK";
                    }
                    else if ($data->status_project==7) {
                      echo "BAPS";
                    }
                    else if ($data->status_project==8) {
                      echo "Close";
                    }
                  ?>
              </td>
              <td><?=$data->aging?></td>
              <td><?=$data->nama_product,' ',$data->bandwith,$data->satuan?></td>
			 			 	<td><?=$data->IO?></td>
              <td><?=$data->SID?></td>
			  			<td><?=$data->nama_pegawai?></td>
			  			<td><?=$data->jalan_ori,', ',$data->kota_ori,', ',$data->provinsi_ori?></td>
              <td><?=$data->jalan_ter,', ',$data->kota_ter,', ',$data->provinsi_ter?></td>
			  			<td><?=$data->create_on?></td>
              <?php if ($this->session->userdata('jabatan')==0){?>
                <td class="text-center">
                  <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#pilih_pm<?=$data->project_id?>" data-backdrop="static" data-keyboard="false">
                      <i class="fas fa-user-times"></i>
                  </button>
                </td>
              <?php }?>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Dispos-->
<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; 
?>
<div class="modal fade" id="pilih_pm<?=$data->project_id?>" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Project Manager</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="table-responsive">
          <form action="<?= site_url('project/dispos_pm')?>" method="post" id="pilihpm">
            <input type="hidden" name="project_id" id="project_id" value=<?=$row->project_id?>>
            <input type="hidden" name="mitra_id" id="mitra_id">
            <table class="table table-bordered" width="100%" id="dataTable1" cellspacing="0">
              <thead>
              <tr class="text-center">
                <th>ID</th>
                <th>Nama Project Manager</th>
                <th>E-Mail</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($pegawai->result() as $i => $data1)  {?>
              <tr>
                <td><?=$data1->pegawai_id?></td>
                <td><?=$data1->nama_pegawai?></td>
                <td><?=$data1->email?></td>
                <td class="text-center">
                <button class="btn btn-info" id="selectpm" type="button" data-id=<?=$data1->pegawai_id;?> data-project="<?= $data->project_id?>">Pilih
                </button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#selectpm', function() {
      var pegawai_id = $(this).data('id');
      $('#pegawai_id').val(pegawai_id);
      var project_id = $(this).data('project');
      $('#project_id').val(project_id);
      document.getElementById("pilihpm").submit();
    })
  })
</script>
<!-- Akhir Modal dispos Data -->
