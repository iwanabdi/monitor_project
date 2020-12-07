<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Approval PO </h5>
				<div class="right">
					<a href="<?= site_url('PO')?>" class="btn btn-warning">
					<i class="fas fa-undo-alt"></i> Back
					</a>
				</div>
	    </div>
    	<form action="<?= site_url('PO/approve_po')?>" method="POST">
	    	<div class="card-body">
                <div class="form-group row">
                <table class="table ml-auto text-gray-800">
                    <thead>
                        <th class="text-center" colspan=2>Purchase Request</th>
                        <th class="text-center" colspan=2>Purchase Order</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label class="col-form-label">NO PR</label></td>
                            <td class="text-center"><input type="number" class="form-control" value="<?=$po->pr_no?>" readonly></td>
                            <td><label class="col-form-label">NO PO</label></td>
                            <td class="text-center"><input type="number" class="form-control" name="no_po" id="no_po" value="<?=$po->po_no?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label class="col-form-label">MITRA PR</label></td>
                            <td class="text-center"><input type="text" class="form-control" value="<?=$po->mitrapr?>" readonly></td>
                            <td><label class="col-form-label">MITRA PO</label></td>
                            <td class="text-center"><input type="text" class="form-control" value="<?=$po->mitrapo?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label class="col-form-label">Delivery PR</label></td>
                            <td class="text-center"><input type="date" class="form-control" value="<?=$po->devdate_pr?>" readonly></td>
                            <td><label class="col-form-label">Delivery PO</label></td>
                            <td class="text-center"><input type="date" class="form-control" value="<?=$po->devdate_po?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label class="col-form-label">Total PR</label></td>
                            <td class="text-center"><input type="text" class="form-control" value="Rp. <?=$po->sub_total_pr?>" readonly></td>
                            <td><label class="col-form-label">TOTAL PO</label></td>
                            <td class="text-center"><input type="text" class="form-control" value="Rp. <?=$po->net_price?>" readonly></td>
                        </tr>
                        <tr>
                            <td colspan=2><label class="col-form-label">Pekerjaan dan QTY PR</label></td>
                            <td colspan=2><label class="col-form-label">Pekerjaan dan QTY PO</label></td>
                        </tr>
                        <td colspan=2>
                            <table>
                                <?php foreach ($dpr->result() as $key => $data){?>
                                        <td><label class="col-form-label"><?=$data->nama_pekerjaan?></label></td>
                                        <td class="text-center"><input type="text" class="form-control" value="<?=$data->qty?>" readonly></td>
                                <?php } ?>
                            </table>
                        </td>
                        <td colspan=2>
                            <table>
                                <?php foreach ($dpo->result() as $key => $data){?>
                                    <td><label class="col-form-label"><?=$data->nama_pekerjaan?></label></td>
                                    <td class="text-center"><input type="text" class="form-control" value="<?=$data->qty?>" readonly></td></tr>
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