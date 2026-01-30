@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Makanan</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nama Makanan</label>
                <input type="text" id="name" name="name" value="{{ old('name', $food->name) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror" required>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Harga (Rp)</label>
                <input type="number" id="price" name="price" value="{{ old('price', $food->price) }}" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('price') border-red-500 @enderror" required>
                @error('price')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-gray-700 font-bold mb-2">Stok (unit)</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock', $food->stock) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('stock') border-red-500 @enderror" required>
                @error('stock')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">{{ old('description', $food->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                @if ($food->image)
                    <div class="mb-3">
                        <p class="text-gray-700 font-bold mb-2">Foto Saat Ini</p>
                        <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="w-full h-40 object-cover rounded">
                    </div>
                @endif
                
                <label for="image" class="block text-gray-700 font-bold mb-2">Ganti Foto Makanan</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <p class="text-gray-500 text-sm mt-1">Format: JPEG, PNG, JPG, GIF (Max: 2MB) - Kosongkan jika tidak ingin mengubah</p>
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Perbarui
                </button>
                <a href="{{ route('foods.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
