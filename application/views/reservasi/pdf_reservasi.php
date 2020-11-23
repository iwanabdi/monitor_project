<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table {
		    width: 100%;
		    border-collapse: collapse;
		    border-spacing: 0;
		    margin-bottom: 20px
		}

		table td,table th {
		    padding: 15px;
		    background: #eee;
		    border: 1px solid #aaa;
		}

		table th {
		    white-space: nowrap;
		    font-weight: 400;
    		background: #ddd;
		}

		table td h3 {
		    margin: 0;
		    font-weight: 400;
		    color: #3989c6;
		}

		table .qty,table .total,table .unit {
		    text-align: right;
		}

		table .no {
		    color: #fff;
		    background: #3989c6
		}

		table .unit {
		    background: #ddd
		}

		table .total {
		    background: #fff;
		    color: #000
		}
		table .tgl {
			background: white;
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
	<hr style="color:blue;">
	<div style="width: 100%; overflow: hidden;">
        <div style="width: 500px; float: left;">
            <h4>FORM PEMESANAN (RESERVATION SLIP)
            <br>NOMOR : <?= $rows->reservasi_no?></h4>
            <h5> PLANT : 2003 SBU Surabaya
            <br>MOV. TYPE : 961 GI for Activation</h5>
        </div>
        <div style="margin-left:-18px;float: right;">
        	<br>
        	<br>
        	<br>
            <h5>COST CENTER : <?= $rows->io?></h5>
        </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th style="text-align:left">
            <h4>NO WORK ORDER</h4>
            <?= $rows->no_wo?>
          </th>
          <th style="text-align:left">
            <h4>LOKASI</h4>
            <?= $rows->lokasi?>
          </th>
        </tr>
      </thead>
    </table>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
              <th style="text-align:center;">No Material</th>
              <th style="text-align:center;">Nama Material</th>
              <th style="text-align:center;">Jumlah</th>
              <th style="text-align:center;">Tanggal</th>
              <th style="text-align:center;">Gudang</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($row->result() as $key => $data) {
            $no = 1;?>
          <tr>
            <!-- <td class="no"><?= $no++;?></td> -->
            <td class="no"><?= $data->material_id;?></td>
            <td class="qty" style="text-align:left"><?= $data->nama_material;?></td>
            <td class="qty"><?= $data->qty;?></td>
            <td class="qty"><?= $data->create_on;?></td>
            <td class="tgl"></td>
          </tr>
         <?php }?>
        </tbody>
    </table>
    <hr>
    <div text-center style="text-align:center;">Disclaimer</div>
    <div text-center style="text-align:center;">Reservation that has not been picked up more than 3 days from requirement date will be automatically deleted from the system</div>
    <div style="padding-top: 200px;"></div>
    <div>Tanggal : </div>
	  <div style="width: 100%; overflow: hidden;">
	    <div style="width:200px;float: left; padding-left: 200px;">
	    	<span>Peminta</span>
        </div>
        <div style="float: right;">
            <span>Pemeriksa</span>
        </div>
	  </div>
	<br>
	  <div>Tanda Tangan : </div>
	<br>
	<br>
	  <div style="width: 100%; overflow: hidden;">
	    <div style="width:200px;float: left;">
	    	<span>Nama:</span>
        </div>
        <div style="float: right">
        	<span style="margin-left: 30px">(</span>
        	<span><?= $data->peminta;?></span>
        	<span style="margin-right: 30px">)</span>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(</span>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span>
        </div>
        <!-- <div style="float: right; padding-right: 100px;">
            <span>Pemeriksa</span>
        </div> -->
	  </div>
</body>
</html>