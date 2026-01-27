<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM Cahaya Minang - Menu</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Rumah makann CAHAYA MINANG</h1>
        <p class="subtitle">"Rancak Bana, Lamak di Awak Katuju di Urang"</p>
    </div>

    <div class="menu-list">
        <div class="menu-item">
            <input type="checkbox" id="menu1" value="Nasi Rendang" data-price="25000">
            <label for="menu1">
                <b>Nasi Rendang</b> - <span class="price">Rp 25.000</span>
            </label>
        </div>

        <div class="menu-item">
            <input type="checkbox" id="menu2" value="Nasi Ayam Pop" data-price="22000">
            <label for="menu2">
                <b>Nasi Ayam Pop</b> - <span class="price">Rp 22.000</span>
            </label>
        </div>

        <div class="menu-item">
            <input type="checkbox" id="menu3" value="Nasi Tunjang" data-price="28000">
            <label for="menu3">
                <b>Nasi Tunjang</b> - <span class="price">Rp 28.000</span>
            </label>
        </div>
    </div>

    <div class="button-group">
        <button class="btn-pesan" onclick="kirimWA('Makan di Sini')">PESAN (Makan Sini)</button>
        <button class="btn-bawa-pulang" onclick="kirimWA('Bawa Pulang')">BAWA PULANG</button>
    </div>

    <div class="footer">
        &copy; 2026 RM Cahaya Minang
    </div>
</div>
<script src="{{ asset('js/scrip.js') }}"></script>
</body>
</html>