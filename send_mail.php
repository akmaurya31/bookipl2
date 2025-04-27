<?php
// 1. Form data ($_POST se)
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

// 2. Google Apps Script URL
$url = 'https://script.google.com/macros/s/AKfycbwE54tEH7T2_JwJhJc_t6S7th5cgV09nyftzD67MGR_ggGJL6LlMvL9xUhDr_jhCJO24w/exec';

// 3. Google Sheet mein data save karna
$data = [
    'sn' => '1',  // Fix ya dynamic serial number
    'name' => $fullName,
    'mobile' => $phone,
    'email' => $email
];

// Send Data to Google Sheets
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

// 4. User ko Confirmation Email bhejna
if ($email) {
    // Email content ko load karna
    $template = file_get_contents('email_template.html');

    // Template mein placeholders replace karna
    $template = str_replace('{FULL_NAME}', $fullName, $template);
    $template = str_replace('{PHONE}', $phone, $template);
    $template = str_replace('{EMAIL}', $email, $template);

    $to = $email; // User ka email
    $subject = "Your IPL Ticket is Booked Successfully!";

    // Headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: bookmyshowtataiolticket2025@gmail.com" . "\r\n";
    $headers .= "Reply-To: bookmyshowtataiolticket2025@gmail.com" . "\r\n";

    // Send email
    if (mail($to, $subject, $template, $headers)) {
        echo "Ticket booked and confirmation email sent!";
    } else {
        echo "Ticket booked but failed to send confirmation email.";
    }
} else {
    echo "No email address provided.";
}
?>
