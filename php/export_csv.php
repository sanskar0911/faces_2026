<?php
// php/export_csv.php
require_once 'config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    die("Access denied.");
}

$filename = "faces_2026_registrations_" . date('Ymd') . ".csv";

// Set headers for download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$output = fopen('php://output', 'w');

// Column headers
fputcsv($output, array('ID', 'Name', 'Email', 'Phone', 'College', 'Branch', 'Year', 'Gender', 'Sport', 'Emergency Contact', 'Payment Status', 'Reg Date'));

// Fetch data
$stmt = $pdo->query("SELECT * FROM students ORDER BY registration_date DESC");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, $row);
}

fclose($output);
exit();
?>
