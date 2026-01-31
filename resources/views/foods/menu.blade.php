@extends('layouts.app')

@if ($food->image)
    <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="w-full h-48 object-cover">
@else
    <img src="https://via.placeholder.com/400x200?text=Rumah+Makan+Minang" alt="No Image" class="w-full h-48 object-cover">
@endif

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Menu Makanan</h1>

    @if ($foods->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">Belum ada menu tersedia</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($foods as $food)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if ($food->image)
                        <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Tidak ada gambar</span>
                        </div>
                    @endif

                    <div class="p-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $food->name }}</h2>
                        
                        <p class="text-2xl font-bold text-blue-600 mb-2">Rp {{ number_format($food->price, 0, ',', '.') }}</p>

                        @if ($food->description)
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($food->description, 100) }}</p>
                        @endif

                        <div class="mb-4 flex items-center gap-2">
                            <span class="text-sm text-gray-600"><strong>Stok:</strong></span>
                            <span class="px-2 py-1 rounded-full text-sm {{ $food->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $food->stock > 0 ? 'Tersedia' : 'Habis' }}
                            </span>
                        </div>

                        <button 
                            onclick="openOrderModal({{ $food->id }}, '{{ $food->name }}', {{ $food->price }})"
                            {{ $food->stock <= 0 ? 'disabled' : '' }}
                            class="w-full {{ $food->stock > 0 ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-400 cursor-not-allowed' }} text-white font-bold py-2 px-4 rounded transition-colors">
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Modal Pemesanan -->
<div id="orderModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Pesan: <span id="modalFoodName" class="text-blue-600"></span></h2>
            <button onclick="closeOrderModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <div class="mb-6 p-3 bg-gray-100 rounded">
            <p class="text-gray-700"><strong>Harga:</strong> Rp <span id="modalFoodPrice"></span></p>
        </div>

        <p class="text-gray-700 mb-4 font-semibold">Pilih metode pengiriman:</p>

        <div class="space-y-3">
            <button 
                onclick="processOrder('delivery')"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded transition-colors flex items-center justify-center gap-2">
                <span>🚗</span> Delivery
            </button>
            <button 
                onclick="processOrder('dine-in')"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-4 rounded transition-colors flex items-center justify-center gap-2">
                <span>🍽️</span> Dine-In
            </button>
        </div>

        <button 
            onclick="closeOrderModal()"
            class="w-full mt-4 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Batal
        </button>
    </div>
</div>

<script>
    let selectedFoodId = null;

    function openOrderModal(foodId, foodName, foodPrice) {
        selectedFoodId = foodId;
        document.getElementById('modalFoodName').textContent = foodName;
        document.getElementById('modalFoodPrice').textContent = foodPrice.toLocaleString('id-ID');
        document.getElementById('orderModal').classList.remove('hidden');
    }

    function closeOrderModal() {
        document.getElementById('orderModal').classList.add('hidden');
        selectedFoodId = null;
    }

    function processOrder(method) {
        if (!selectedFoodId) return;

        const method_text = method === 'delivery' ? 'Delivery' : 'Dine-In';
        alert(`Pesanan berhasil!\n\nMetode: ${method_text}\nFood ID: ${selectedFoodId}\n\nPesanan akan diproses oleh admin.`);
        
        // Optional: Bisa dikirim ke backend
        // fetch('/api/orders', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json',
        //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //     },
        //     body: JSON.stringify({
        //         food_id: selectedFoodId,
        //         method: method
        //     })
        // }).then(response => response.json())
        //   .then(data => {
        //       alert('Pesanan berhasil dibuat! Nomor pesanan: ' + data.order_id);
        //       closeOrderModal();
        //   });

        closeOrderModal();
    }

    // Tutup modal jika klik di luar
    document.getElementById('orderModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeOrderModal();
        }
    });
</script>

@endsection
