@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <div class="max-w-6xl mx-auto py-8 px-4">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white mb-2">Transaksi Penjualan</h1>
            <p class="text-slate-400">Buat transaksi penjualan baru untuk produk Anda</p>
        </div>

        @if (session('success'))
            <div class="bg-green-500/20 border border-green-500/30 text-green-400 px-4 py-3 mb-6 rounded-lg backdrop-blur-sm">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('sales.store') }}" id="salesForm">
            @csrf

            <!-- Items Section -->
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 mb-6">
                <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                        </svg>
                    </div>
                    Daftar Barang
                </h3>

                <!-- Table Header -->
                <div class="grid grid-cols-12 gap-4 mb-4 text-sm font-medium text-slate-400 uppercase tracking-wider">
                    <div class="col-span-6">Nama Barang</div>
                    <div class="col-span-3">Jumlah</div>
                    <div class="col-span-3 text-center">Aksi</div>
                </div>

                <div id="items-wrapper" class="space-y-3">
                    <div class="item-row bg-white/5 border border-white/10 rounded-lg p-4 grid grid-cols-12 gap-4 items-center hover:bg-white/10 transition-colors">
                        <div class="col-span-6">
                            <select name="items[0][id]" class="item-select bg-slate-800/50 border border-slate-600 text-white p-3 rounded-lg w-full focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors" required>
                                <option value="" class="bg-slate-800">Pilih Barang</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}" data-price="{{ $item->harga_jual }}" class="bg-slate-800">
                                        {{ $item->nama_barang }} - Rp {{ number_format($item->harga_jual, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-3">
                            <input type="number" name="items[0][qty]" class="item-qty bg-slate-800/50 border border-slate-600 text-white p-3 rounded-lg w-full focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors" min="1" value="1" required>
                        </div>
                        <div class="col-span-3 text-center">
                            <button type="button" class="remove-item bg-red-500/20 hover:bg-red-500/30 border border-red-500/30 text-red-400 px-4 py-2 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="addItemRow()" class="mt-4 bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah Barang
                </button>
            </div>

            <!-- Transaction Details -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Summary Card -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </div>
                        Ringkasan Transaksi
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-400 mb-2">Total Pembayaran</label>
                            <input type="text" id="totalDisplay" class="bg-slate-800/30 border border-slate-600 text-white text-xl font-bold p-4 rounded-lg w-full" disabled>
                            <input type="hidden" name="total" id="total">
                        </div>

                        <!-- Summary Stats -->
                        <div class="grid grid-cols-3 gap-4 mt-6">
                            <div class="bg-blue-500/20 border border-blue-500/30 rounded-lg p-3 text-center">
                                <div class="text-xs text-blue-400 uppercase tracking-wider">Items</div>
                                <div class="text-lg font-bold text-blue-300" id="itemCount">0</div>
                            </div>
                            <div class="bg-purple-500/20 border border-purple-500/30 rounded-lg p-3 text-center">
                                <div class="text-xs text-purple-400 uppercase tracking-wider">Quantity</div>
                                <div class="text-lg font-bold text-purple-300" id="totalQty">0</div>
                            </div>
                            <div class="bg-yellow-500/20 border border-yellow-500/30 rounded-lg p-3 text-center">
                                <div class="text-xs text-yellow-400 uppercase tracking-wider">Avg Price</div>
                                <div class="text-lg font-bold text-yellow-300" id="avgPrice">0</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Card -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        Detail Pembayaran
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-400 mb-2">Uang Diberikan</label>
                            <input type="number" name="paid" id="paid" class="bg-slate-800/50 border border-slate-600 text-white text-xl p-4 rounded-lg w-full focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors" required placeholder="0">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-400 mb-2">Kembalian</label>
                            <input type="text" id="changeDisplay" class="bg-slate-800/30 border border-slate-600 text-green-400 text-xl font-bold p-4 rounded-lg w-full" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-bold py-4 px-6 rounded-xl text-lg transition-all duration-200 transform hover:scale-[1.02] shadow-lg">
                    <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let itemIndex = 1;

function addItemRow() {
    const wrapper = document.getElementById('items-wrapper');
    const row = document.createElement('div');
    row.classList.add('item-row', 'bg-white/5', 'border', 'border-white/10', 'rounded-lg', 'p-4', 'grid', 'grid-cols-12', 'gap-4', 'items-center', 'hover:bg-white/10', 'transition-colors');

    row.innerHTML = `
        <div class="col-span-6">
            <select name="items[${itemIndex}][id]" class="item-select bg-slate-800/50 border border-slate-600 text-white p-3 rounded-lg w-full focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors" required>
                <option value="" class="bg-slate-800">Pilih Barang</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" data-price="{{ $item->harga_jual }}" class="bg-slate-800">
                        {{ $item->nama_barang }} - Rp {{ number_format($item->harga_jual, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-span-3">
            <input type="number" name="items[${itemIndex}][qty]" class="item-qty bg-slate-800/50 border border-slate-600 text-white p-3 rounded-lg w-full focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors" min="1" value="1" required>
        </div>
        <div class="col-span-3 text-center">
            <button type="button" class="remove-item bg-red-500/20 hover:bg-red-500/30 border border-red-500/30 text-red-400 px-4 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9 2a1 1 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    `;

    wrapper.appendChild(row);
    itemIndex++;
    attachListeners();
    calculateTotal();
}

function calculateTotal() {
    let total = 0;
    let itemCount = 0;
    let totalQty = 0;
    
    document.querySelectorAll('.item-row').forEach(row => {
        const select = row.querySelector('.item-select');
        const qtyInput = row.querySelector('.item-qty');
        const price = select.options[select.selectedIndex]?.dataset?.price || 0;
        const qty = parseInt(qtyInput.value) || 0;
        
        if (select.value && qty > 0) {
            total += parseInt(price) * qty;
            itemCount++;
            totalQty += qty;
        }
    });
    
    document.getElementById('total').value = total;
    document.getElementById('totalDisplay').value = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
    document.getElementById('itemCount').textContent = itemCount;
    document.getElementById('totalQty').textContent = totalQty;
    document.getElementById('avgPrice').textContent = itemCount > 0 ? 'Rp ' + new Intl.NumberFormat('id-ID').format(Math.round(total / totalQty)) : 'Rp 0';

    const paid = parseInt(document.getElementById('paid').value || 0);
    const change = paid - total;
    const changeColor = change >= 0 ? 'text-green-400' : 'text-red-400';
    const changeDisplay = document.getElementById('changeDisplay');
    changeDisplay.value = 'Rp ' + new Intl.NumberFormat('id-ID').format(change);
    changeDisplay.className = changeDisplay.className.replace(/text-(green|red)-400/, changeColor);
}

function handleRemoveRow(e) {
    const row = e.target.closest('.item-row');
    if (document.querySelectorAll('.item-row').length > 1) {
        row.remove();
        calculateTotal();
    } else {
        // Create a custom alert with dark theme
        const alertDiv = document.createElement('div');
        alertDiv.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
        alertDiv.innerHTML = `
            <div class="bg-slate-800 border border-slate-600 rounded-xl p-6 max-w-sm mx-4">
                <div class="text-white font-semibold mb-2">Peringatan</div>
                <div class="text-slate-300 mb-4">Minimal satu barang harus ada dalam transaksi.</div>
                <button onclick="this.closest('.fixed').remove()" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors">
                    OK
                </button>
            </div>
        `;
        document.body.appendChild(alertDiv);
    }
}

document.getElementById('salesForm').addEventListener('submit', function(e) {
    const total = parseInt(document.getElementById('total').value) || 0;
    const paid = parseInt(document.getElementById('paid').value) || 0;
    if (total === 0) {
        e.preventDefault();
        alert('Harap pilih minimal satu barang dengan jumlah yang valid.');
        return;
    }
    if (paid < total) {
        e.preventDefault();
        alert('Uang yang diberikan kurang dari total pembayaran.');
        return;
    }
});

function attachListeners() {
    document.querySelectorAll('.item-select, .item-qty, #paid').forEach(el => {
        el.removeEventListener('input', calculateTotal);
        el.addEventListener('input', calculateTotal);
    });

    document.querySelectorAll('.remove-item').forEach(btn => {
        btn.removeEventListener('click', handleRemoveRow);
        btn.addEventListener('click', handleRemoveRow);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    attachListeners();
    calculateTotal();
});
</script>
@endsection