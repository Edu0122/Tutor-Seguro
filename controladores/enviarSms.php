<?php

$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://481f-2800-150-13b-f71-98b5-4071-63b-b1e6.sa.ngrok.io',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "to": "+569' . $_POST['telefono'] . '",
    "message": "Su codigo para el retiro es ' . $_POST['codigo'] .' , Si usted autorizo el retiro, porfavor reenvielo a la persona autorizada"
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: db71606d',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>