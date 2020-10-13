<?php

    $id_provinsi = $_POST["id_provinsi"];
    $nama_kota = $_POST["nama_kota"];
    $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi,
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
        $data_kota = $array_response["rajaongkir"]["results"];

        echo '<option selected disabled value="">--Pilih Kota--</option>';
        foreach ($data_kota as $key => $tiap_kota) {
          if ($nama_kota) {
            echo "<option selected value='".$tiap_kota['type']." ".$tiap_kota['city_name']."'>";
            echo $tiap_kota['type']. " ";
            echo $tiap_kota['city_name'];
            echo "</option>";
          }else{
            echo "<option value='".$tiap_kota['type']." ".$tiap_kota['city_name']."'>";
            echo $tiap_kota['type']. " ";
            echo $tiap_kota['city_name'];
            echo "</option>";
          }
          
        }
      }
?>