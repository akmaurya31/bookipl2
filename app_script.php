<?php 

 // 2. Form se aaya data ($_POST)
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';


// Data set karo
$data = [
    'sn' => '1',  // Serial Number fix kar diya, ya dynamic kar sakte ho
    'name' => $fullName,
    'mobile' => $phone,
    'email' => $email
];


// Google Apps Script URL (jo tumhe deploy karte waqt mila tha)
  $url = 'https://script.google.com/macros/s/AKfycbwE54tEH7T2_JwJhJc_t6S7th5cgV09nyftzD67MGR_ggGJL6LlMvL9xUhDr_jhCJO24w/exec';

// CURL se POST request bhejo
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$response = curl_exec($ch);
curl_close($ch);

// Response dekho
echo $response;
?>
