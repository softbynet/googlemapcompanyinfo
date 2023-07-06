<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $map_link = $_POST['map_link'];


  $place_id = $map_link;

  if ($place_id) {

    $api_url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$place_id&fields=name,formatted_address,website,formatted_phone_number&key=API_KEY";
    $response = file_get_contents($api_url);
    $data = json_decode($response, true);
    
    if ($data['status'] === 'OK') {
      // İşletme bilgilerini kullanabilirsiniz
      $name = $data['result']['name'];
      $address = $data['result']['formatted_address'];
      $website = $data['result']['website'];
      $phone = $data['result']['formatted_phone_number'];
    
      // İşletme bilgilerini gösterin
      echo "<h2>$name</h2>";
      echo "<p>Adres: $address</p>";
      echo "<p>Website: <a href='$website'>$website</a></p>";
      echo "<p>Telefon: $phone</p>";
    } else {
      echo "İşletme bilgileri alınamadı. Hata: " . $data['status'];
    }
}
    
}




?>
