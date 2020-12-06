<!DOCTYPE html>
<html>
<head>
	<title>PDF SURAT JALAN</title>
	<style type="text/css">
		.item{
		    padding: 15px;
		    /*background: #eee;*/
		    border:1px solid black;
		}
	</style>
</head>
<body>
	<div style="width: 100%;">
	    <div style="width: 600px; float: left;">
	    	<img src="<?=base_url('assets/invoice/logo_icon.png');?>" width="100px">
	    </div>
	    <div style="float: right;">
	    	<img src="<?=base_url('assets/invoice/logo_k3.png');?>" width="80px">
	    </div>
	</div>
    <div>
    	<b><h1 style="padding-top: -80px; margin-top: 50px;text-align:center;font-family: courier;">
    		<u >Surat Jalan</u>
    	</h1>
    	<h4 style="padding-top: -105px; margin-top: 100px;text-align:center;font-family: courier;">00<?= $rows->gi_no;?>/SJ/XII/LOG/ICON+/2020</h4>
    	</b>
    </div>

	
	<div style="width: 100%; overflow: hidden;padding-top:10px;padding-bottom:10px;">
        <div style="width: 500px; float: left;">
			<table style="font-size: 12px;font-family: courier;">
				<tr>
					<td style="padding-bottom: 20px;">Kepada</td>
					<td style="padding-bottom: 20px;">:</td>
					<td style="padding-bottom: 20px;">PT. Indonesia Comnets Plus</td>
				</tr>
				<tr>
					<td style="border-top: 1px solid black;">Pekerjaan</td>
					<td style="border-top: 1px solid black;">:</td>
					<td style="border-top: 1px solid black;"><?= $rows->no_wo?></td>
				</tr>
				<tr>
					<td style="border-top: 1px solid black;border-bottom: 1px solid black;">IO Number</td>
					<td style="border-top: 1px solid black;border-bottom: 1px solid black;">:</td>
					<td style="border-top: 1px solid black;border-bottom: 1px solid black;"><?= $rows->io?></td>
				</tr>
			</table>
        </div>
        <div style="margin-left:-50px;float: right;">
        	<table style="font-size: 12px;font-family: courier;">
				<tr>
					<td style="border-bottom: 1px solid black;">Nama Proyek</td>
					<td style="border-bottom: 1px solid black;"></td>
					<td style="border-bottom: 1px solid black;"></td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid black;">Tgl Kirim</td>
					<td style="border-bottom: 1px solid black;"></td>
					<td style="border-bottom: 1px solid black;"><?= date('Y-m-d');?></td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid black;">No. Kendaraan</td>
					<td style="border-bottom: 1px solid black;"></td>
					<td style="border-bottom: 1px solid black;"></td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid black;">Pengemudi</td>
					<td style="border-bottom: 1px solid black;"></td>
					<td style="border-bottom: 1px solid black;"></td>
				</tr>
			</table>
        </div>
		<div style="padding-top:20px;"></div>
        <table style="
    		width: 100%;
		    border-collapse: collapse;
		    border-spacing: 0;
		    margin-bottom: 20px;
		    font-size: 12px;
		    font-family: courier;">
    	<thead>
    		<tr>
	    		<th class="item">NO</th>
	    		<th class="item">NAMA BARANG</th>
	    		<th class="item">JUMLAH</th>
	    		<th class="item">SAT</th>
	    		<th class="item">KETERANGAN</th>
	    	</tr>
    	</thead>
    	<tbody>
    		<?php 
    		$no = 1;
    		foreach ($row->result() as $key => $data) { ?>
    		<tr>
    			<td class="item"><?= $no++;?></td>
    			<td class="item"><?= $data->nama_material;?></td>
    			<td class="item"><?= $data->qty;?></td>
    			<td class="item">Kosong</td>
    			<td class="item">Serial Number : <?= $data->serial_number;?></td>
    		</tr>
         <?php }?>
    	</tbody>
    </table>
	<div style="padding-top:5px;"></div>
	<span>Barang tersebut dalam kondisi baik dan demikian surat jalan ini dibuat untuk dipergunakan sebagaimana mestinya</span>

	<div style="width: 100%; overflow: hidden;">
	    <div style="width: 600px; float: left;">
	    	<h5>Nama Penerima:
	    	<br>
	    	<br>
	    	<br>
	    	<br>( Tanda Tangan )</h5>
	    </div>
	    <div style="margin-left:-50px;float: right;text-align:center;">
	        <h5><?= date('Y-m-d')?>
	        <br>Mengetahui:
	        <br>
	        <br>
	        <br>Nama Mitra
	        <br>Alamat ta iki?
	        </h5>
	    </div>
	</div>

</body>
</html>