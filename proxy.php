<?php

// Step 1: Sheet ID डालो
$sheetID = '1uOizVEbJY9PRypIlp5k_toanakRXAP3lS4MNf-4d1Lk';

// Step 2: Sheet का Public URL बनाओ
$url = "https://docs.google.com/spreadsheets/d/$sheetID/gviz/tq?tqx=out:json";

// Step 3: URL से डेटा लो
$response = file_get_contents($url);

// Step 4: Response से Unwanted characters हटाओ
$data = json_decode(substr($response, 47, -2), true);

// Step 5: अब rows पढ़ो
$rows = $data['table']['rows'];

 
// print_r($rows); die("ASdf");

// Step 6: अब $rows को loop कर लो
foreach ($rows as $row) {
    $payment_method = $row['c'][0]['v'] ?? '';
    $account_holder = $row['c'][1]['v'] ?? '';
    $account_number = $row['c'][2]['v'] ?? '';
    $ifsc_code = $row['c'][3]['v'] ?? '';
    $bank_name = $row['c'][4]['v'] ?? '';
    $payment_status = $row['c'][5]['v'] ?? '';
    $note = $row['c'][6]['v'] ?? '';
    $qurl = $row['c'][7]['v'] ?? '';

    //echo "Payment Method: $payment_method, Account Holder: $account_holder, Account Number: $account_number, IFSC Code: $ifsc_code, Bank Name: $bank_name, Payment Status: $payment_status, Note: $note <br>";
}


// https://drive.google.com/file/d/10NhuGiqoppn2U97vJXyXXLeZh1zWRyJC/view?usp=drivesdk

preg_match('/\/d\/(.*?)\//', $qurl, $matches);

if (isset($matches[1])) {
    $qrid = $matches[1];
    // echo "File ID: " . $fileId;
} else {
    // echo "File ID not found.";
}


// print_r($qrid);
// die("fsdfs");

// $id = '10NhuGiqoppn2U97vJXyXXLeZh1zWRyJC';


$url = "https://drive.google.com/uc?export=download&id=" . $qrid;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$data = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

// VERY IMPORTANT HEADERS
header('Content-Type: image/jpeg'); 
header('Content-Length: ' . strlen($data)); 
// header('Cache-Control: public, max-age=86400'); // Optional: caching ke liye


// HEADERS to FORCE always fresh image
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

echo $data;
?>
