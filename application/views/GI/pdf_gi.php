<!DOCTYPE html>
<html>
<head>
	<title>PDF GI</title>
	<style type="text/css">
		.item{
		    padding: 15px;
		    /*background: #eee;*/
		    border:1px dashed black;
		}
	</style>
</head>
<body>
	<div style="width: 100%; overflow: hidden;">
	    <div style="width: 600px; float: left;">
	    	<img src="<?=base_url('assets/invoice/logo_icon.png');?>" width="100px">
	    </div>
	    <div style="margin-left:-230px;float: right;">
	    	<h2 style="padding-bottom: -10px;">PT Indonesia Comnets Plus</h2>
	        <h5>Wisma Mulia, 50th Floor
	        <br>Jalan Jendral Gatot Subroto No. 42
	        <br>Jakarta 12710
	        </h5>
	    </div>
	</div>
	<div style="border-bottom:1px dashed black;"></div>
	<div style="width: 100%; overflow: hidden;">
	    <div style="width:600px;float: left;">
	    	<span style="font-family: courier">GR / GI - SLIP</span>
        </div>
        <div style="float: right">
        	<span style="margin-left: 150px;text-align: right;font-family: courier;">
        		NO : <?= $rows->gi_no;?></span>
        </div>
        <!-- <div style="float: right; padding-right: 100px;">
            <span>Pemeriksa</span>
        </div> -->
    </div>
	<div style="border-bottom:1px dashed black;"></div>
	<div style="width: 100%; overflow: hidden;padding-top:10px;padding-bottom:10px;">
        <div style="width: 500px; float: left;">
			<table style="font-size: 12px;font-family: courier;">
				<tr>
					<td>Posting Date</td>
					<td>:</td>
					<td><?= $rows->create_on?></td>
				</tr>
				<tr>
					<td>Current Date</td>
					<td>:</td>
					<td><?= date('Y-m-d');?></td>
				</tr>
				<tr>
					<td>Document Date</td>
					<td>:</td>
					<td><?= $rows->create_on?></td>
				</tr>
			</table>
        </div>
        <div style="margin-left:-50px;float: right;">
        	<table style="font-size: 12px;font-family: courier;">
				<tr>
					<td>Plant</td>
					<td>:</td>
					<td>2003</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>:</td>
					<td>SBU Surabaya</td>
				</tr>
			</table>
        </div>
    </div>
    <table style="
    		width: 100%;
		    border-collapse: collapse;
		    border-spacing: 0;
		    margin-bottom: 20px;
		    font-size: 12px;
		    font-family: courier;">
    	<thead>
    		<tr>
	    		<th class="item">Itm</th>
	    		<th class="item">Material<br>Location<br>Text<br>Serial Number</th>
	    		<th class="item">Acct.Assgt</th>
	    		<th class="item">Qty. Un</th>
	    	</tr>
    	</thead>
    	<tbody>
    		<?php  
    		$no = 1;
    		foreach ($row->result() as $key => $data) { ?>
    		<tr>
    			<td class="item"><?= $no++;?></td>
    			<td class="item">
    				<?= $data->nama_material;?><br>
    				<?= $data->lokasi;?><br>
    				<?= $data->no_wo;?><br>
    				<?= $data->serial_number;?>	
    			</td>
    			<td class="item"><?= $data->io;?></td>
    			<td class="item"><?= $data->qty;?></td>
    		</tr>
         <?php }?>
    	</tbody>
    </table>
	<div style="border-bottom:1px dashed black;padding-bottom:50px;"></div>
	<div style="width: 440px; float: left;padding-top: 10px;">
		<table style="font-size: 12px;font-family: courier;">
			<tr>
				<td>Mvt. Type</td>
				<td>:</td>
				<td>961 GI for Activation</td>
			</tr>
		</table>
    </div>
    <div style="float: right;padding-top: 10px;">
    	<table style="font-size: 12px;font-family: courier;text-align:right;">
			<tr>
				<td>Issued by</td>
				<td>:</td>
				<td><?= $rows->nama_hgi;?></td>
			</tr>
		</table>
    </div>
	<div style="border-bottom:1px dashed black;padding-top:10px;"></div>
	<div style="width: 440px; float: left;padding-top: 10px;">
		<table style="font-size: 12px;font-family: courier;">
			<tr>
				<td>Recipient</td>
				<td>:</td>
				<td><?= $rows->nama_reservasi;?></td>
			</tr>
		</table>
    </div>
    <div style="float: right;padding-top: 10px;">
    	<table style="font-size: 12px;font-family: courier;text-align:right;">
			<tr>
				<td>SIGNATURE</td>
				<td>:</td>
				<td></td>
			</tr>
		</table>
    </div>
	<div style="border-bottom:1px dashed black;padding-top:10px;"></div>
</body>
</html>