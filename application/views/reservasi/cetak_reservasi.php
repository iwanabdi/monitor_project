<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Surat Tugas Aktivasi</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="<?=base_url();?>assets/invoice/logo_icon.png">
      </div>
      <div id="logo1">
        <img src="<?=base_url();?>assets/invoice/logo_k3.png">
      </div>
      <div id="invoice">
          <h1 class="invoice"><u>Surat Tugas Aktivasi</u></h1>
          <h2 class="invoice"><?= $row->reservasi_no;?></h2>
          <!-- <div class="date">Date of Invoice: 01/06/2014</div>
          <div class="date">Due Date: 30/06/2014</div> -->
      </div>
    </header>
  </body>
</html>
<script type="text/javascript">
  alert("Klik OK Untuk Simpan File / Print File !!!")
  window.print();
</script>