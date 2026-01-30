// Konfigurasi Nomor WhatsApp
// GANTI NOMOR INI DENGAN NOMOR WHATSAPP BISNIS ANDA
const WHATSAPP_NUMBER = '6281234567890';

/**
 * Fungsi untuk mengirim pesanan ke WhatsApp
 * @param {string} menuName - Nama menu yang dipesan
 * @param {number} price - Harga menu
 */
function orderWhatsapp(menuName, price) {
    // Format pesan untuk WhatsApp
    const message = `Halo, saya ingin memesan:

*${menuName}*
Harga: Rp ${price.toLocaleString('id-ID')}

Terima kasih!`;
    
    // Encode pesan untuk URL
    const encodedMessage = encodeURIComponent(message);
    
    // Buat URL WhatsApp
    const whatsappUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodedMessage}`;
    
    // Buka WhatsApp di tab baru
    window.open(whatsappUrl, '_blank');
}

/**
 * Fungsi untuk tombol Admin
 * Saat ini hanya menampilkan alert, nanti akan dihubungkan ke halaman admin
 */
function adminLogin() {
    alert('Halaman admin sedang dalam pengembangan.\n\nFitur yang akan tersedia:\n• Dashboard\n• Kelola Menu\n• Kelola Pesanan\n• Laporan Penjualan');
    
    // Uncomment baris di bawah jika sudah ada halaman admin
    // window.location.href = 'admin.html';
}

/**
 * Intersection Observer untuk animasi scroll
 * Menampilkan elemen ketika masuk ke viewport
 */
document.addEventListener('DOMContentLoaded', function() {
    // Konfigurasi observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    // Callback ketika elemen terlihat
    const observerCallback = function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    };

    // Buat observer
    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // Observe semua menu card
    document.querySelectorAll('.menu-card').forEach(card => {
        observer.observe(card);
    });
});

/**
 * Smooth scroll untuk navigasi
 */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

/**
 * Efek parallax untuk hero section
 */
window.addEventListener('scroll', function() {
    const hero = document.querySelector('.hero');
    if (hero) {
        const scrolled = window.pageYOffset;
        const heroContent = document.querySelector('.hero-content');
        if (heroContent) {
            heroContent.style.transform = `translateY(${scrolled * 0.5}px)`;
            heroContent.style.opacity = 1 - (scrolled / 500);
        }
    }
});

/**
 * Animasi counter untuk harga (optional)
 */
function animateValue(element, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        element.innerHTML = 'Rp ' + Math.floor(progress * (end - start) + start).toLocaleString('id-ID');
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

/**
 * Handle klik pada social media links
 */
document.querySelectorAll('.social-link').forEach(link => {
    link.addEventListener('click', function() {
        // Tambahkan link social media yang sesuai
        alert('Fitur social media akan segera tersedia!');
        
        // Contoh implementasi:
        // const socialType = this.textContent;
        // if (socialType === '📘') {
        //     window.open('https://facebook.com/yourpage', '_blank');
        // }
    });
});

/**
 * Loading animation saat halaman dimuat
 */
window.addEventListener('load', function() {
    document.body.classList.add('loaded');
});

/**
 * Fungsi untuk menampilkan notifikasi
 * @param {string} message - Pesan yang akan ditampilkan
 * @param {string} type - Tipe notifikasi (success, error, info)
 */
function showNotification(message, type = 'info') {
    // Implementasi notifikasi sederhana
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        padding: 1rem 1.5rem;
        background: ${type === 'success' ? '#25D366' : type === 'error' ? '#DC3545' : '#17A2B8'};
        color: white;
        border-radius: 10px;
        z-index: 10000;
        animation: slideIn 0.3s ease-out;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-in';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Tambahkan style untuk animasi notifikasi
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);