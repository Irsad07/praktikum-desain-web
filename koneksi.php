<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel_znz");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($conn, 'utf8mb4');
?>