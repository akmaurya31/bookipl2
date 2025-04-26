<?php
// Get ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// If ID exists, redirect to ticket{id}.php
if ($id > 0) {
    header('Location: ticket' . $id . '.php');
    exit;
} else {
    // ID missing or invalid
    header('Location: error.php');
    exit;
}
?>
