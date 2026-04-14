<?php
// php/config.php

$host = 'localhost';
$dbname = 'faces_2026';
$username = 'root';
$password = ''; // Default XAMPP password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // In production, don't show the error details
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
