<?php
  
  $nama_provinsi = $_POST["nama_provinsi"];
  // var_dump($nama_provinsi);

  $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: 0c5ae87214c5f72d2b46c593b93ca561"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $array_response = json_decode($response, TRUE);
      $data_provinsi = $array_response["rajaongkir"]["results"];
      // print_r($data_provinsi);
      echo '<option selected disabled value="">--Pilih Provinsi--</option>';
      foreach ($data_provinsi as $key => $tiap_provinsi) {
        if ($tiap_provinsi['province'] == $nama_provinsi) {
          echo "<option selected value='".$tiap_provinsi['province']."' id_provinsi='".$tiap_provinsi["province_id"]."' >";
          echo $tiap_provinsi['province'];
          echo "</option>";
        }else{
          echo "<option value='".$tiap_provinsi['province']."' id_provinsi='".$tiap_provinsi["province_id"]."' >";
          echo $tiap_provinsi['province'];
          echo "</option>";
        }
      }
    }
  

?>

