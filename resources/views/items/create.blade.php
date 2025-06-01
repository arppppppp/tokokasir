@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-pulse animation-delay-4000"></div>
    </div>

    <div class="relative z-10 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <!-- Main Card -->
            <div class="bg-gray-900/80 backdrop-blur-xl border border-gray-700/50 rounded-2xl shadow-2xl overflow-hidden">
                <div class="p-8">
                    <!-- Header Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-6">
                            <a href="{{ route('items.index') }}" 
                               class="inline-flex items-center text-sm text-gray-400 hover:text-purple-400 transition-colors duration-200 group">
                                <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali ke Daftar Item
                            </a>
                        </div>
                        
                        <!-- Icon and Title -->
                        <div class="text-center mb-6">
                            <div class="mx-auto w-16 h-16 bg-gradient-to-r from-purple-500 to-blue-500 rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <h1 class="text-3xl font-bold text-white">Tambah Item Baru</h1>
                            <p class="text-gray-400 mt-2">Lengkapi form di bawah untuk menambahkan item baru</p>
                        </div>
                    </div>

                    <!-- Form -->
                    <form id="itemForm" action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        <!-- Photo Upload Section -->
                        <div>
                            <label for="foto" class="block text-sm font-medium text-gray-300 mb-3">
                                Foto Produk
                            </label>
                            <div id="upload-container" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-600 border-dashed rounded-xl hover:border-purple-500 transition-all duration-300 bg-gray-800/50">
                                <div class="space-y-1 text-center">
                                    <div id="photo-preview" class="hidden mb-4">
                                        <img id="preview-image" class="mx-auto h-32 w-32 object-cover rounded-xl shadow-lg border-2 border-purple-500" src="" alt="Preview">
                                    </div>
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex justify-center items-center text-sm text-gray-400">
                                        <label for="foto" class="relative cursor-pointer bg-transparent rounded-md font-medium text-purple-400 hover:text-purple-300 focus-within:outline-none transition-colors duration-200">
                                            <span>Upload foto</span>
                                            <input id="foto" name="foto" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                                </div>
                            </div>
                            @error('foto')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Name -->
                        <div>
                            <label for="nama_barang" class="block text-sm font-medium text-gray-300 mb-2">
                                Nama Barang <span class="text-red-400">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="nama_barang" 
                                       name="nama_barang" 
                                       value="{{ old('nama_barang') }}"
                                       class="block w-full bg-gray-800/50 border border-gray-600 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent text-white placeholder-gray-400 px-4 py-3 transition-all duration-200 @error('nama_barang') border-red-500 @enderror"
                                       placeholder="Masukkan nama barang"
                                       required>
                            </div>
                            @error('nama_barang')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pricing Section -->
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Modal Price -->
                            <div>
                                <label for="harga_modal" class="block text-sm font-medium text-gray-300 mb-2">
                                    Harga Modal <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-400 text-sm">Rp</span>
                                    </div>
                                    <input type="number" 
                                           id="harga_modal" 
                                           name="harga_modal" 
                                           value="{{ old('harga_modal') }}"
                                           class="block w-full bg-gray-800/50 border border-gray-600 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent text-white placeholder-gray-400 pl-12 pr-4 py-3 transition-all duration-200 @error('harga_modal') border-red-500 @enderror"
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
                                <label for="harga_jual" class="block text-sm font-medium text-gray-300 mb-2">
                                    Harga Jual <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-400 text-sm">Rp</span>
                                    </div>
                                    <input type="number" 
                                           id="harga_jual" 
                                           name="harga_jual" 
                                           value="{{ old('harga_jual') }}"
                                           class="block w-full bg-gray-800/50 border border-gray-600 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent text-white placeholder-gray-400 pl-12 pr-4 py-3 transition-all duration-200 @error('harga_jual') border-red-500 @enderror"
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
                        </div>

                        <!-- Stock Quantity -->
                        <div>
                            <label for="stok" class="block text-sm font-medium text-gray-300 mb-2">
                                Stok Barang <span class="text-red-400">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       id="stok" 
                                       name="stok" 
                                       value="{{ old('stok') }}"
                                       class="block w-full bg-gray-800/50 border border-gray-600 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent text-white placeholder-gray-400 px-4 py-3 transition-all duration-200 @error('stok') border-red-500 @enderror"
                                       placeholder="0"
                                       min="0"
                                       step="1"
                                       required>
                            </div>
                            @error('stok')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
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
                        <div class="flex items-center justify-end space-x-4 pt-8 border-t border-gray-700">
                            <a href="{{ route('items.index') }}" 
                               class="inline-flex items-center px-6 py-3 border border-gray-600 shadow-sm text-sm font-medium rounded-xl text-gray-300 bg-gray-800/50 hover:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 backdrop-blur-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-wide hover:from-purple-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes pulse {
    0%, 100% { opacity: 0.2; }
    50% { opacity: 0.4; }
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

/* Custom scrollbar for dark theme */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(55, 65, 81, 0.3);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: rgba(139, 92, 246, 0.5);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: rgba(139, 92, 246, 0.7);
}
</style>

<script>
    function previewImage(event) {
        const input = event.target;
        const previewContainer = document.getElementById('photo-preview');
        const previewImage = document.getElementById('preview-image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
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

// Update on stok input change as well
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('stok').addEventListener('input', calculateProfit);
    
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