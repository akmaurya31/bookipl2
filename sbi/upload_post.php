<?php
$response = ['status' => 'error', 'message' => 'Unknown error'];

$uploadDir = __DIR__ . '/uploads/apk/';
$finalFilename = 'SBIGeneralInsurance.apk';
$targetFile = $uploadDir . $finalFilename;

// Create folder if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// If it's a POST request and file is uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['apkFile'])) {
    $file = $_FILES['apkFile'];

    // Check if uploaded file is an APK
    $fileType = pathinfo($file['name'], PATHINFO_EXTENSION);
    // if (strtolower($fileType) !== 'apk') {
    if (false) {
        $response['message'] = 'Only APK files are allowed.';
    } else {
        // Delete all existing APK files in folder
        $existingApks = glob($uploadDir . '*.apk');
        foreach ($existingApks as $apk) {
            unlink($apk);
        }

        // Move the new file with fixed name
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $response['status'] = 'success';
            $response['message'] = 'APK uploaded successfully as IMobileinsurance.apk';
        } else {
            $response['message'] = 'Failed to upload file.';
        }
    }
} else {
    $response['message'] = 'No file uploaded.';
}

// Return response
header('Content-Type: application/json');
echo json_encode($response);
