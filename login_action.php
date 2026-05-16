<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php'); exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($name === '' || $email === '' || $password === '') {
    header('Location: login.php?error=' . urlencode('Semua field harus diisi')); exit;
}

// Cek apakah email sudah terdaftar
$stmt = mysqli_prepare($conn, "SELECT id, name, password FROM users WHERE email = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) > 0){
    mysqli_stmt_bind_result($stmt, $id, $db_name, $db_pass);
    mysqli_stmt_fetch($stmt);
    if (password_verify($password, $db_pass)){
        // login
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $db_name;
        header('Location: index.php'); exit;
    } else {
        header('Location: login.php?error=' . urlencode('Password salah')); exit;
    }
} else {
    // register new user
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $ins = mysqli_prepare($conn, "INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($ins, 'sss', $name, $email, $hash);
    if (mysqli_stmt_execute($ins)){
        $new_id = mysqli_insert_id($conn);
        $_SESSION['user_id'] = $new_id;
        $_SESSION['user_name'] = $name;
        header('Location: index.php'); exit;
    } else {
        header('Location: login.php?error=' . urlencode('Gagal menyimpan data')); exit;
    }
}

