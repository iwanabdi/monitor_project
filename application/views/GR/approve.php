<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Approval GR </h5>
				<div class="right">
					<a href="<?= site_url('GR')?>" class="btn btn-warning">
					<i class="fas fa-undo-alt"></i> Back
					</a>
				</div>
	    </div>
    	<form action="<?= site_url('GR/approve_gr')?>" method="POST">
	    	<div class="card-body">
                <div class="form-group row">
                <table class="table ml-auto text-gray-800">
                    <thead>
                        <th class="text-center" colspan=2>Purchase Order</th>
                        <th class="text-center" colspan=2>Good Receipt</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label class="col-form-label">NO PO</label></td>
                            <td class="text-center"><input type="number" class="form-control" value="<?=$gr->po_no?>" readonly></td>
                            <td><label class="col-form-label">NO GR</label></td>
                            <td class="text-center"><input type="number" class="form-control" name="gr_no" id="gr_no" value="<?=$gr->gr_no?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label class="col-form-label">Mitra PO</label></td>
                            <td class="text-center"><input type="text" class="form-control" value="<?=$gr->mitra?>" readonly></td>
                            <td><label class="col-form-label">Mitra GR</label></td>
                            <td class="text-center"><input type="text" class="form-control" value="<?=$gr->mitragr?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label class="col-form-label">Delivery PO</label></td>
                            <td class="text-center"><input type="date" class="form-control" value="<?=$gr->devdate_po?>" readonly></td>
                            <td><label class="col-form-label">GR Date</label></td>
                            <td class="text-center"><input type="date" class="form-control" value="<?=$gr->createon_gr?>" readonly></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><label class="col-form-label">Discount</label></td>
                            <td><input type="text" class="form-control text-right" value="<?=$gr->discount?> %" readonly></td>
                        </tr>
                        <tr>
                            <td><label class="col-form-label">Total PO</label></td>
                            <td><input type="text" class="form-control text-right" value="Rp. <?=$gr->net_price?>" readonly></td>
                            <td><label class="col-form-label">Total GR</label></td>
                            <td><input type="text" class="form-control text-right" value="Rp. <?=$gr->total_value?>" readonly></td>
                        </tr>
                        <tr>
                            <td colspan=2><label class="col-form-label">Pekerjaan dan QTY PO</label></td>
                            <td colspan=2><label class="col-form-label">Pekerjaan dan QTY GR</label></td>
                        </tr>
                        <td colspan=2>
                            <table>
                                <?php foreach ($dpo->result() as $key => $data){?>
                                        <td><label class="col-form-label"><?=$data->nama_pekerjaan?></label></td>
                                        <td class="text-center"><input type="text" class="form-control" value="<?=$data->qty?>" readonly></td>
                                        <td><input type="text" class="form-control text-right" value="Rp. <?=$data->total?>" readonly></td></tr>
                                <?php } ?>
                            </table>
                        </td>
                        <td colspan=2>
                            <table>
                                <?php foreach ($dgr->result() as $key => $data){?>
                                    <td><label class="col-form-label"><?=$data->nama_pekerjaan?></label></td>
                                    <td class="text-center"><input type="text" class="form-control text" value="Rp. <?=$data->qty?>" readonly></td>
                                    <td><input type="text" class="form-control text-right" value="Rp. <?=$data->net_value?>" readonly></td></tr>
                                <?php } ?>
                            </table>
                        </td>
                    </tbody>
                </table>
                </div>
	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Approve</button>
			</div>
			<!-- </div> -->
    	</form>
  </div>
  <!-- End Card -->

</div>
<!-- End Container -->