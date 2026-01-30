@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard Manajemen Stok Makanan</h1>
        <div class="flex gap-3">
            <a href="{{ route('foods.menu') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                👁️ Lihat Menu
            </a>
            <a href="{{ route('foods.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                + Tambah Makanan
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if ($foods->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">Belum ada data makanan. <a href="{{ route('foods.create') }}" class="text-blue-500 hover:text-blue-600 font-bold">Tambah makanan sekarang</a></p>
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
                        
                        <div class="mb-3">
                            <p class="text-sm text-gray-600">
                                <strong>Harga:</strong> Rp {{ number_format($food->price, 0, ',', '.') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Stok:</strong> 
                                <span class="px-2 py-1 rounded-full {{ $food->stock > 10 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $food->stock }} unit
                                </span>
                            </p>
                        </div>

                        @if ($food->description)
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($food->description, 100) }}</p>
                        @endif

                        <div class="flex gap-2">
                            <a href="{{ route('foods.edit', $food->id) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-3 rounded text-center text-sm">
                                Edit
                            </a>
                            <form action="{{ route('foods.destroy', $food->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus makanan ini?')" class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-3 rounded text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
