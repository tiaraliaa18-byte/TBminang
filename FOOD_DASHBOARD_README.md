# Dashboard Manajemen Stok Makanan

## Fitur
- ✅ Menampilkan daftar makanan dengan gambar
- ✅ Menambahkan makanan baru (nama, harga, stok, deskripsi, foto)
- ✅ Mengubah informasi makanan (nama, harga, stok, deskripsi, foto)
- ✅ Menghapus makanan
- ✅ Upload dan manage foto makanan
- ✅ Status stok (warna hijau jika stok > 10, merah jika <= 10)

## Struktur File yang Dibuat

### Model
- `app/Models/Food.php` - Model untuk data makanan

### Controller
- `app/Http/Controllers/FoodController.php` - Controller untuk CRUD makanan

### Views
- `resources/views/foods/index.blade.php` - Dashboard daftar makanan
- `resources/views/foods/create.blade.php` - Form tambah makanan baru
- `resources/views/foods/edit.blade.php` - Form edit makanan

### Database
- `database/migrations/2026_01_30_000000_create_foods_table.php` - Migrasi tabel foods
- `database/seeders/FoodSeeder.php` - Seeder dengan data contoh makanan

### Routes
- `GET /foods` - Menampilkan daftar makanan (dashboard)
- `GET /foods/create` - Form tambah makanan
- `POST /foods` - Simpan makanan baru
- `GET /foods/{id}/edit` - Form edit makanan
- `PUT /foods/{id}` - Simpan perubahan makanan
- `DELETE /foods/{id}` - Hapus makanan

## Cara Mengakses

1. **Dashboard Makanan**: [http://localhost:8000/foods](http://localhost:8000/foods)
2. **Tambah Makanan**: [http://localhost:8000/foods/create](http://localhost:8000/foods/create)
3. **Edit Makanan**: Klik tombol "Edit" pada kartu makanan
4. **Hapus Makanan**: Klik tombol "Hapus" pada kartu makanan

## Spesifikasi Teknis

### Database Fields (Tabel `foods`)
- `id` - Primary key
- `name` - Nama makanan (string, required)
- `price` - Harga (decimal, required)
- `stock` - Jumlah stok (integer)
- `description` - Deskripsi makanan (text, nullable)
- `image` - Path foto makanan (string, nullable)
- `created_at` & `updated_at` - Timestamp

### Validasi Form
- **Nama**: Required, maksimal 255 karakter
- **Harga**: Required, numeric, minimal 0
- **Stok**: Required, integer, minimal 0
- **Deskripsi**: Optional
- **Foto**: Optional, format JPEG/PNG/JPG/GIF, maksimal 2MB

## Fitur Keamanan
- CSRF Protection di semua form
- Konfirmasi sebelum menghapus data
- Validasi data di server-side
- File upload dengan validasi tipe dan ukuran
- Otomatis menghapus foto lama saat update/delete

## Design & Styling
- Menggunakan Tailwind CSS untuk styling
- Responsive design (mobile-friendly)
- Grid layout dengan 3 kolom di desktop, 2 kolom di tablet, 1 kolom di mobile
- Status stok dengan badge warna (hijau/merah)

## Data Contoh
Seeder telah menambahkan 5 makanan contoh:
1. Nasi Goreng - Rp 35.000 (stok: 50)
2. Mie Goreng - Rp 30.000 (stok: 40)
3. Soto Ayam - Rp 25.000 (stok: 30)
4. Gado-gado - Rp 20.000 (stok: 25)
5. Lumpia - Rp 15.000 (stok: 60)

## File Storage
Foto-foto makanan disimpan di: `storage/app/public/foods/`
Pastikan folder `storage/app/public` writable!
