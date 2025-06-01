@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900">
    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Card -->
            <div class="bg-gray-800/90 backdrop-blur-sm border border-gray-700/50 rounded-2xl shadow-2xl overflow-hidden">
                <div class="p-8">
                    <!-- Header Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-6">
                            <a href="{{ route('items.index') }}" 
                               class="inline-flex items-center text-sm text-gray-400 hover:text-white transition-colors duration-200 group">
                                <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali ke Daftar Item
                            </a>
                        </div>
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-2xl mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <h1 class="text-3xl font-bold text-white mb-2">Edit Item</h1>
                            <p class="text-gray-400">Perbarui informasi item <span class="text-purple-400 font-medium">{{ $item->nama_barang }}</span></p>
                        </div>
                    </div>

                    <!-- Form -->
                    <form id="itemForm" action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Photo Upload Section -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-4">
                                Foto Produk
                            </label>
                            
                            <!-- Current Photo Display -->
                            @if ($item->foto)
                                <div class="mb-6">
                                    <div class="flex items-start space-x-4 p-4 bg-gray-700/50 rounded-xl border border-gray-600/50">
                                        <div class="flex-shrink-0">
                                            <img id="current-image" 
                                                 src="{{ asset('storage/' . $item->foto) }}" 
                                                 alt="{{ $item->nama_barang }}"
                                                 class="h-20 w-20 object-cover rounded-xl shadow-lg border-2 border-gray-600">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-white">Foto saat ini</p>
                                            <p class="text-sm text-gray-400 mb-3">Upload foto baru untuk menggantinya</p>
                                            <button type="button" 
                                                    onclick="removeCurrentPhoto()" 
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-500/20 border border-red-500/30 rounded-lg text-xs font-medium text-red-400 hover:bg-red-500/30 hover:text-red-300 transition-all duration-200">
                                                <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Hapus Foto
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Photo Upload Area -->
                            <div class="relative">
                                <div id="upload-container" class="flex justify-center px-6 pt-8 pb-8 border-2 border-dashed border-gray-600 rounded-xl hover:border-purple-500/50 transition-colors duration-300 bg-gray-700/20">
                                    <div class="space-y-2 text-center">
                                        <div id="photo-preview" class="hidden mb-4">
                                            <img id="preview-image" class="mx-auto h-32 w-32 object-cover rounded-xl shadow-lg border-2 border-purple-500" src="" alt="Preview">
                                        </div>
                                        <div class="w-12 h-12 mx-auto mb-4 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </div>
                                        <div class="flex flex-col sm:flex-row items-center justify-center text-sm text-gray-300">
                                            <label for="foto" class="cursor-pointer bg-gradient-to-r from-purple-500 to-indigo-500 hover:from-purple-600 hover:to-indigo-600 px-4 py-2 rounded-lg font-medium text-white transition-all duration-200 transform hover:scale-105">
                                                <span>{{ $item->foto ? 'Ganti foto' : 'Upload foto' }}</span>
                                                <input id="foto" name="foto" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                            </label>
                                            <p class="mt-2 sm:mt-0 sm:ml-2">atau drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                                    </div>
                                </div>
                            </div>
                            @error('foto')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Name -->
                        <div>
                            <label for="nama_barang" class="block text-sm font-semibold text-white mb-3">
                                Nama Barang <span class="text-red-400">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="nama_barang" 
                                       name="nama_barang" 
                                       value="{{ old('nama_barang', $item->nama_barang) }}"
                                       class="block w-full pl-4 pr-12 py-3 bg-gray-700/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('nama_barang') border-red-500 @enderror"
                                       placeholder="Masukkan nama barang"
                                       required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('nama_barang')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pricing and Stock Section -->
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                            <!-- Modal Price -->
                            <div>
                                <label for="harga_modal" class="block text-sm font-semibold text-white mb-3">
                                    Harga Modal <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-400 text-sm font-medium">Rp</span>
                                    </div>
                                    <input type="number" 
                                           id="harga_modal" 
                                           name="harga_modal" 
                                           value="{{ old('harga_modal', $item->harga_modal) }}"
                                           class="block w-full pl-12 pr-4 py-3 bg-gray-700/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('harga_modal') border-red-500 @enderror"
                                           placeholder="0"
                                           min="0"
                                           step="1"
                                           oninput="calculateProfit()"
                                           required>
                                </div>
                                @error('harga_modal')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Selling Price -->
                            <div>
                                <label for="harga_jual" class="block text-sm font-semibold text-white mb-3">
                                    Harga Jual <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-400 text-sm font-medium">Rp</span>
                                    </div>
                                    <input type="number" 
                                           id="harga_jual" 
                                           name="harga_jual" 
                                           value="{{ old('harga_jual', $item->harga_jual) }}"
                                           class="block w-full pl-12 pr-4 py-3 bg-gray-700/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('harga_jual') border-red-500 @enderror"
                                           placeholder="0"
                                           min="0"
                                           step="1"
                                           oninput="calculateProfit()"
                                           required>
                                </div>
                                @error('harga_jual')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Stock -->
                            <div>
                                <label for="stok" class="block text-sm font-semibold text-white mb-3">
                                    Stok <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" 
                                           id="stok" 
                                           name="stok" 
                                           value="{{ old('stok', $item->stok) }}"
                                           class="block w-full pl-4 pr-12 py-3 bg-gray-700/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('stok') border-red-500 @enderror"
                                           placeholder="0"
                                           min="0"
                                           step="1"
                                           oninput="calculateProfit()"
                                           required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    </div>
                                </div>
                                @error('stok')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Profit Calculation Display -->
                        <div id="profit-display" class="hidden">
                            <div class="bg-gradient-to-r from-green-900/50 to-emerald-900/50 backdrop-blur-sm rounded-xl p-6 border border-green-700/50">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-green-300 mb-1">Estimasi Keuntungan</h4>
                                        <div class="flex items-baseline space-x-2">
                                            <span id="profit-amount" class="text-2xl font-bold text-green-400"></span>
                                            <span id="profit-percentage" class="text-sm text-green-300"></span>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                                            <svg class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-600/30">
                            <a href="{{ route('items.index') }}" 
                               class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-gray-600 rounded-xl text-sm font-medium text-gray-300 bg-gray-700/50 hover:bg-gray-600/50 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </a>
                            <button type="submit" 
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-purple-500 to-indigo-500 hover:from-purple-600 hover:to-indigo-600 border border-transparent rounded-xl font-semibold text-sm text-white shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition-all duration-200 transform hover:scale-105">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Update Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('photo-preview');
            const previewImage = document.getElementById('preview-image');
            previewImage.src = e.target.result;
            preview.classList.remove('hidden');

            // Add a nice fade-in effect
            preview.style.opacity = '0';
            setTimeout(() => {
                preview.style.transition = 'opacity 0.3s ease-in-out';
                preview.style.opacity = '1';
            }, 100);

            const uploadContainer = document.getElementById('upload-container');
            uploadContainer.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
}

function removeCurrentPhoto() {
    if (confirm('Yakin ingin menghapus foto saat ini?')) {
        document.getElementById('current-image').style.display = 'none';
        // You might want to add a hidden input to mark photo for deletion
    }
}

function calculateProfit() {
    const modalPrice = parseFloat(document.getElementById('harga_modal').value) || 0;
    const sellingPrice = parseFloat(document.getElementById('harga_jual').value) || 0;
    const stock = parseInt(document.getElementById('stok').value) || 0;

    if (modalPrice > 0 && sellingPrice > 0 && stock > 0) {
        const totalJual = sellingPrice * stock;
        const profit = totalJual - modalPrice;
        const profitPercentage = (profit / modalPrice) * 100;

        document.getElementById('profit-amount').textContent = 'Rp ' + profit.toLocaleString('id-ID');
        document.getElementById('profit-percentage').textContent = '(' + profitPercentage.toFixed(1) + '%)';
        
        const profitDisplay = document.getElementById('profit-display');
        profitDisplay.classList.remove('hidden');
        
        // Add a nice slide-down effect
        profitDisplay.style.opacity = '0';
        profitDisplay.style.transform = 'translateY(-10px)';
        setTimeout(() => {
            profitDisplay.style.transition = 'all 0.3s ease-in-out';
            profitDisplay.style.opacity = '1';
            profitDisplay.style.transform = 'translateY(0)';
        }, 100);
    } else {
        document.getElementById('profit-display').classList.add('hidden');
    }
}

// Initialize calculation and add event listeners on page load
document.addEventListener('DOMContentLoaded', function() {
    // Add event listener to stok input for calculateProfit
    document.getElementById('stok').addEventListener('input', calculateProfit);
    
    // Initialize calculation with current values
    calculateProfit();
    
    // Add subtle focus effects to form inputs
    const inputs = document.querySelectorAll('input[type="text"], input[type="number"]');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
            this.parentElement.style.transition = 'transform 0.2s ease-in-out';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });
});

// Form validation
document.getElementById('itemForm').addEventListener('submit', function(event) {
    const requiredFields = [
        { id: 'nama_barang', name: 'Nama Barang' },
        { id: 'harga_modal', name: 'Harga Modal' },
        { id: 'harga_jual', name: 'Harga Jual' },
        { id: 'stok', name: 'Stok Barang' },
    ];

    let isValid = true;
    let message = '';

    requiredFields.forEach(field => {
        const el = document.getElementById(field.id);
        if (!el.value.trim()) {
            isValid = false;
            message += `- ${field.name} harus diisi\n`;
            el.classList.add('border-red-500');
        } else {
            el.classList.remove('border-red-500');
        }
    });

    if (!isValid) {
        event.preventDefault();
        alert('Mohon lengkapi field berikut:\n\n' + message);
    }
});
</script>
@endsection