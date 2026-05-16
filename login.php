<?php session_start(); ?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Bimbel ZNZ</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .login-container{max-width:1000px;margin:40px auto;display:flex;gap:30px;align-items:center}
    .illustration{flex:1}
    .card-login{flex:1;background:#fff;padding:28px;border-radius:14px;box-shadow:0 6px 20px rgba(0,0,0,0.08)}
    .card-login h2{text-align:center;margin-bottom:18px}
    .form-group{margin-bottom:12px}
    .form-group input{width:100%;padding:12px;border-radius:8px;border:1px solid #ddd}
    .btn-primary{display:inline-block;padding:12px 20px;background:#e07b4b;color:#fff;border-radius:10px;border:none;cursor:pointer}
    .small-muted{font-size:13px;color:#666;margin-top:8px}
  </style>
</head>
<body>
  <div class="login-container">
    <div class="illustration">
      <img src="hero-illustration.png" alt="illustration" style="max-width:100%;">
    </div>
    <div class="card-login">
      <h2>Belajar seru bersama ZNZ</h2>
      <?php if(!empty($_GET['error'])): ?>
        <div style="color:#b00020;margin-bottom:12px"><?php echo htmlspecialchars($_GET['error']); ?></div>
      <?php endif; ?>
      <form action="login_action.php" method="post">
        <div class="form-group"><input type="text" name="name" placeholder="Masukkan nama lengkap" required></div>
        <div class="form-group"><input type="email" name="email" placeholder="Masukkan email (opsional)" required></div>
        <div class="form-group"><input type="password" name="password" placeholder="Buat password" required></div>
        <div style="margin-top:10px">
          <button class="btn-primary" type="submit">Lanjutkan</button>
        </div>
      </form>
      <div class="small-muted">Dengan mendaftar Anda setuju dengan Kebijakan Privasi dan Syarat & Ketentuan kami.</div>
    </div>
  </div>
</body>
</html>
