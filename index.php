<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimbel ZNZ - Sukses Belajar Bersama Kami</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
    /* kecil: dropdown user */
    .user-btn{position:relative;display:inline-block}
    .user-dropdown{display:none;position:absolute;right:0;background:#fff;border:1px solid #ddd;padding:8px;border-radius:6px;box-shadow:0 4px 10px rgba(0,0,0,0.1)}
    .user-dropdown a{display:block;color:#333;padding:6px;text-decoration:none}
    .user-dropdown a:hover{background:#f2f2f2}
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <header>
        <div class="logo">
            <img src="LOGO BIMBEL_.png" alt="Logo Bimbel ZNZ" class="logo-img">
            <div class="logo-text">Bimbel<span>ZNZ</span></div>
        </div>
        <nav>
            <ul>
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#program">Program Kelas</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
                <li><a href="#tentang">Tentang ZNZ</a></li>
            </ul>
        </nav>
        <?php if (!empty($_SESSION['user_name'])): ?>
            <div class="user-btn">
                <button id="userToggle" class="btn btn-daftar"><?php echo htmlspecialchars($_SESSION['user_name']); ?></button>
                <div id="userMenu" class="user-dropdown">
                    <a href="#" id="viewProfile">Profil</a>
                    <a href="logout.php">Keluar</a>
                </div>
            </div>
        <?php else: ?>
            <a href="login.php" class="btn btn-daftar">Login</a>
        <?php endif; ?>
    </header>

    <!-- HERO SECTION (Sambutan) -->
    <section id="beranda" class="hero">
        <div class="hero-text">
            <h1>Belajar Lebih Seru,<br>Prestasi Makin Maju!</h1>
            <p>Platform bimbingan belajar terbaik dengan materi lengkap, tutor berpengalaman, dan metode belajar interaktif yang bikin kamu cepat paham.</p>
            <div class="hero-buttons">
                <a href="#program" class="btn btn-utama">Lihat Paket Belajar</a>
            </div>
        </div>
    </section>

    <!-- (Bagian lain tetap sama, dipersingkat di sini untuk ringkas) -->
    <?php include 'index_content_footer.php'; ?>

    <script>
    document.getElementById('userToggle')?.addEventListener('click', function(e){
        e.stopPropagation();
        const menu = document.getElementById('userMenu');
        if(menu) menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });
    document.addEventListener('click', function(){
        const menu = document.getElementById('userMenu'); if(menu) menu.style.display = 'none';
    });
    </script>
    <script src="script.js"></script>
</body>
</html>
