<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Rumah Makan Minang - Menyajikan masakan Padang autentik dengan cita rasa asli">
    <meta name="keywords" content="rumah makan minang, masakan padang, rendang, gulai, restoran padang">
    <title>Rumah Makan Minang - Cita Rasa Asli Padang</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Header -->
    <header>
      <nav>
        <div class="logo">🍛 Rumah Makan Minang</div>
        <a href="{{ route('login') }}" class="admin-btn">Admin</a>
      </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-decoration decoration-1">🌶️</div>
        <div class="hero-decoration decoration-2">🍛</div>
        <div class="hero-content">
            <h1>Cita Rasa Asli Padang</h1>
            <p>Nikmati kelezatan masakan Minang autentik dengan bumbu rempah pilihan</p>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu-section" id="menu">
        <h2 class="section-title">Menu Spesial Kami</h2>
        <p class="section-subtitle">Dipilih dengan cinta, disajikan dengan kebanggaan</p>
        
        <div class="menu-grid">
            <!-- Menu Card 1 -->
            <div class="menu-card">
                <div class="popular-badge">⭐ Populer</div>
                <div class="menu-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=800&auto=format&fit=crop" alt="Rendang Daging" class="menu-image-photo">
                </div>
                <div class="menu-info">
                    <h3 class="menu-name">Rendang Daging</h3>
                    <p class="menu-desc">Daging sapi empuk dimasak dengan bumbu rempah khas Minang selama berjam-jam</p>
                    <div class="menu-price">Rp 45.000</div>
                    <button class="order-btn" onclick="orderWhatsapp('Rendang Daging', 45000)">Pesan Sekarang</button>
                </div>
            </div>

            <!-- Menu Card 2 -->
            <div class="menu-card">
                <div class="popular-badge">⭐ Populer</div>
                <div class="menu-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1626074353765-517a681e40be?w=800&auto=format&fit=crop" alt="Gulai Ikan Kakap" class="menu-image-photo">
                </div>
                <div class="menu-info">
                    <h3 class="menu-name">Gulai Ikan Kakap</h3>
                    <p class="menu-desc">Ikan kakap segar dengan kuah gulai kuning yang gurih dan kaya rempah</p>
                    <div class="menu-price">Rp 38.000</div>
                    <button class="order-btn" onclick="orderWhatsapp('Gulai Ikan Kakap', 38000)">Pesan Sekarang</button>
                </div>
            </div>

            <!-- Menu Card 3 -->
            <div class="menu-card">
                <div class="menu-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1598103442097-8b74394b95c6?w=800&auto=format&fit=crop" alt="Ayam Pop" class="menu-image-photo">
                </div>
                <div class="menu-info">
                    <h3 class="menu-name">Ayam Pop</h3>
                    <p class="menu-desc">Ayam goreng khas Padang yang renyah di luar, lembut di dalam dengan bumbu meresap</p>
                    <div class="menu-price">Rp 32.000</div>
                    <button class="order-btn" onclick="orderWhatsapp('Ayam Pop', 32000)">Pesan Sekarang</button>
                </div>
            </div>

            <!-- Menu Card 4 -->
            <div class="menu-card">
                <div class="menu-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1645696329716-039c8e6a0c05?w=800&auto=format&fit=crop" alt="Gulai Tunjang" class="menu-image-photo">
                </div>
                <div class="menu-info">
                    <h3 class="menu-name">Gulai Tunjang</h3>
                    <p class="menu-desc">Kikil sapi yang empuk dengan kuah gulai kental penuh rempah autentik</p>
                    <div class="menu-price">Rp 35.000</div>
                    <button class="order-btn" onclick="orderWhatsapp('Gulai Tunjang', 35000)">Pesan Sekarang</button>
                </div>
            </div>

            <!-- Menu Card 5 -->
            <div class="menu-card">
                <div class="menu-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1606491956689-2ea866880c84?w=800&auto=format&fit=crop" alt="Sayur Nangka" class="menu-image-photo">
                </div>
                <div class="menu-info">
                    <h3 class="menu-name">Sayur Nangka</h3>
                    <p class="menu-desc">Nangka muda dimasak dengan santan dan bumbu khas yang menggugah selera</p>
                    <div class="menu-price">Rp 25.000</div>
                    <button class="order-btn" onclick="orderWhatsapp('Sayur Nangka', 25000)">Pesan Sekarang</button>
                </div>
            </div>

            <!-- Menu Card 6 -->
            <div class="menu-card">
                <div class="menu-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1632621849521-3cea83f6e9e4?w=800&auto=format&fit=crop" alt="Telur Balado" class="menu-image-photo">
                </div>
                <div class="menu-info">
                    <h3 class="menu-name">Telur Balado</h3>
                    <p class="menu-desc">Telur rebus digoreng dan disiram sambal balado pedas yang khas</p>
                    <div class="menu-price">Rp 15.000</div>
                    <button class="order-btn" onclick="orderWhatsapp('Telur Balado', 15000)">Pesan Sekarang</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Rumah Makan Minang</h3>
                <p>Menyajikan masakan Minang autentik dengan resep turun temurun sejak 1985. Setiap hidangan dibuat dengan penuh cinta dan dedikasi.</p>
                <div class="social-links">
                    <a href="#" class="social-link" aria-label="Facebook">📘</a>
                    <a href="#" class="social-link" aria-label="Instagram">📷</a>
                    <a href="#" class="social-link" aria-label="Twitter">🐦</a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Menu Unggulan</h3>
                <ul>
                    <li>🍛 Rendang Daging</li>
                    <li>🐟 Gulai Ikan</li>
                    <li>🍗 Ayam Pop</li>
                    <li>🥘 Gulai Tunjang</li>
                    <li>🌶️ Sambal Balado</li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Kontak Kami</h3>
                <ul>
                    <li>📍 Jl. Raya Padang No. 123</li>
                    <li>📞 <a href="tel:+6281234567890">+62 812-3456-7890</a></li>
                    <li>✉️ <a href="/cdn-cgi/l/email-protection#721b1c141d32001f1f1b1c131c155c111d1f"><span class="__cf_email__" data-cfemail="7c15121a133c0e111115121d121b521f1311">[email&#160;protected]</span></a></li>
                    <li>🕐 Buka: 08.00 - 22.00 WIB</li>
                </ul>
            </div>
            
            <script src="{{ asset('js/script.js') }}"></script>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2026 Rumah Makan Minang. Dibuat dengan cito raso kito