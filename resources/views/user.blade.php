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
    <meta name="csrf-token" content="{{ csrf_token() }}"
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
            @forelse($foods as $food)
                <div class="menu-card">
                    <div class="menu-image-wrapper">
                        @if($food->image)
                            <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="menu-image-photo">
                        @else
                            <div style="width: 100%; height: 200px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 10px;">
                                <span style="color: #999;">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>

                    <div class="menu-info">
                        <h3 class="menu-name">{{ $food->name }}</h3>
                        <p class="menu-desc">{{ Str::limit($food->description ?? 'Makanan lezat khas Padang', 80) }}</p>
                        <div class="menu-price">Rp {{ number_format($food->price, 0, ',', '.') }}</div>
                    </div>

                    <article class="rm-card rm-menu-item">
                        <div class="container">
                            <div class="stepper-box">
                                <button type="button" class="qty-btn minus-btn" data-food-id="{{ $food->id }}">-</button>
                                <span class="qty-count" data-food-id="{{ $food->id }}">0</span>
                                <button type="button" class="qty-btn plus-btn" data-food-id="{{ $food->id }}">+</button>
                            </div>
                        </div>

                        <button type="button" class="order-btn" onclick="addToCart({{ $food->id }}, '{{ addslashes($food->name) }}', {{ $food->price }})">Pesan Sekarang</button>
                    </article>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                    <p style="color: #999; font-size: 16px;">Belum ada menu tersedia</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Modal Pemesanan -->
    <div id="orderModal" class="modal-overlay hidden">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">🛒 Keranjang Belanja</h2>
                <button type="button" class="modal-close" onclick="closeOrderModal()">&times;</button>
            </div>

            <div id="cartItemsContainer" class="cart-items-container">
                <p style="text-align: center; color: #999; padding: 20px;">Keranjang kosong. Pilih makanan untuk memulai pesanan!</p>
            </div>

            <div class="modal-summary">
                <div class="summary-row">
                    <strong>Total Harga:</strong> 
                    <strong style="color: var(--primary); font-size: 1.2rem;">Rp <span id="totalPrice">0</span></strong>
                </div>
            </div>

            <p class="modal-subtitle">Pilih metode pengiriman:</p>

            <div class="modal-buttons">
                <button type="button" class="modal-btn delivery-btn" onclick="processOrder('delivery')">
                    <span>🚗</span> Delivery
                </button>
                <button type="button" class="modal-btn dine-in-btn" onclick="processOrder('dine-in')">
                    <span>🍽️</span> Dine-In
                </button>
            </div>

            <button type="button" class="modal-btn cancel-btn" onclick="closeOrderModal()">Batal</button>
        </div>
    </div>

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
                <h3>Kontak Kami</h3>
                <ul>
                    <li>📍 Jl. Raya Padang No. 123</li>
                    <li>📞 <a href="tel:+6281234567890">+62 812-3456-7890</a></li>
                    <li>✉️ <a href="mailto:info@rumahmakanminang.com">info@rumahmakanminang.com</a></li>
                    <li>🕐 Buka: 08.00 - 22.00 WIB</li>
                </ul>
            </div>
            
            <script src="{{ asset('js/script.js') }}"></script>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2026 Rumah Makan Minang. Dibuat dengan ❤️ untuk pecinta kuliner</p>
        </div>
    </footer>

    <script>
        // Cart system
        let cart = {};

        function addToCart(foodId, foodName, foodPrice) {
            const qty = parseInt(document.querySelector(`.qty-count[data-food-id="${foodId}"]`).textContent) || 1;
            
            if (qty === 0) {
                alert('⚠️ Silakan pilih jumlah makanan terlebih dahulu!');
                return;
            }

            if (cart[foodId]) {
                cart[foodId].quantity += qty;
            } else {
                cart[foodId] = {
                    name: foodName,
                    price: foodPrice,
                    quantity: qty
                };
            }

            // Reset counter
            document.querySelector(`.qty-count[data-food-id="${foodId}"]`).textContent = '0';

            // Update cart display
            updateCartDisplay();
            openOrderModal();
        }

        function removeFromCart(foodId) {
            delete cart[foodId];
            updateCartDisplay();
        }

        function updateCartItemQty(foodId, change) {
            if (cart[foodId]) {
                cart[foodId].quantity += change;
                if (cart[foodId].quantity <= 0) {
                    removeFromCart(foodId);
                } else {
                    updateCartDisplay();
                }
            }
        }

        function updateCartDisplay() {
            const container = document.getElementById('cartItemsContainer');
            const cartItems = Object.entries(cart);

            if (cartItems.length === 0) {
                container.innerHTML = '<p style="text-align: center; color: #999; padding: 20px;">Keranjang kosong. Pilih makanan untuk memulai pesanan!</p>';
                document.getElementById('totalPrice').textContent = '0';
                return;
            }

            let html = '';
            let totalPrice = 0;

            cartItems.forEach(([foodId, item]) => {
                const itemTotal = item.price * item.quantity;
                totalPrice += itemTotal;

                html += `
                    <div class="cart-item">
                        <div class="cart-item-name">${item.name}</div>
                        <div class="cart-item-qty">
                            <button onclick="updateCartItemQty(${foodId}, -1)">-</button>
                            <span>${item.quantity}x</span>
                            <button onclick="updateCartItemQty(${foodId}, 1)">+</button>
                        </div>
                        <div class="cart-item-price">Rp ${itemTotal.toLocaleString('id-ID')}</div>
                        <button class="cart-item-remove" onclick="removeFromCart(${foodId})">Hapus</button>
                    </div>
                `;
            });

            container.innerHTML = html;
            document.getElementById('totalPrice').textContent = totalPrice.toLocaleString('id-ID');
        }

        function openOrderModal() {
            document.getElementById('orderModal').classList.remove('hidden');
        }

        function closeOrderModal() {
            document.getElementById('orderModal').classList.add('hidden');
        }

        function processOrder(method) {
            const cartItems = Object.entries(cart);
            
            if (cartItems.length === 0) {
                alert('⚠️ Keranjang belanja kosong!');
                return;
            }

            const methodText = method === 'delivery' ? 'Delivery 🚗' : 'Dine-In 🍽️';
            let message = `Halo Rumah Makan Minang! 👋\n\nSaya ingin memesan:\n\n`;
            let totalPrice = 0;

            cartItems.forEach(([foodId, item]) => {
                const itemTotal = item.price * item.quantity;
                totalPrice += itemTotal;
                message += `🍛 ${item.name}\n`;
                message += `   Qty: ${item.quantity}x @ Rp ${item.price.toLocaleString('id-ID')}\n`;
                message += `   Subtotal: Rp ${itemTotal.toLocaleString('id-ID')}\n\n`;
            });

            message += `────────────────────\n`;
            message += `💰 TOTAL: Rp ${totalPrice.toLocaleString('id-ID')}\n`;
            message += `🚗 Metode: ${methodText}\n\n`;
            message += `Terima kasih telah memesan! 😊\nTunggu konfirmasi dari kami.`;
            
            // Nomor WhatsApp
            const phoneNumber = '62882015476619';
            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
            
            window.open(whatsappUrl, '_blank');
            
            // Clear cart setelah order
            setTimeout(() => {
                cart = {};
                updateCartDisplay();
                closeOrderModal();
            }, 500);
        }

        // Tutup modal jika klik di luar
        document.getElementById('orderModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeOrderModal();
            }
        });

        // Quantity button handlers
        document.querySelectorAll('.plus-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const foodId = this.dataset.foodId;
                const countEl = document.querySelector(`.qty-count[data-food-id="${foodId}"]`);
                let count = parseInt(countEl.textContent) || 0;
                countEl.textContent = count + 1;
            });
        });

        document.querySelectorAll('.minus-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const foodId = this.dataset.foodId;
                const countEl = document.querySelector(`.qty-count[data-food-id="${foodId}"]`);
                let count = parseInt(countEl.textContent) || 0;
                if (count > 0) {
                    countEl.textContent = count - 1;
                }
            });
        });
    </script>
</body>
</html>