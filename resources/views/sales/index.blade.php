@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Riwayat Penjualan</h1>
                <p class="text-slate-400">Kelola dan pantau semua transaksi penjualan Anda</p>
            </div>

            <!-- Filter Section -->
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 mb-8">
                <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    Filter Transaksi
                </h3>

                <form method="GET" action="{{ route('sales.index') }}" class="grid md:grid-cols-5 gap-4 items-end">
                    <!-- Existing Dari Tanggal -->
                    <div>
                        <label for="from" class="block text-sm font-medium text-slate-400 mb-2">Dari Tanggal</label>
                        <input type="date" name="from" id="from" value="{{ request('from') }}" 
                            class="bg-slate-800/50 border border-slate-600 text-white p-3 rounded-lg w-full focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors">
                    </div>

                    <!-- Existing Sampai Tanggal -->
                    <div>
                        <label for="to" class="block text-sm font-medium text-slate-400 mb-2">Sampai Tanggal</label>
                        <input type="date" name="to" id="to" value="{{ request('to') }}" 
                            class="bg-slate-800/50 border border-slate-600 text-white p-3 rounded-lg w-full focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors">
                    </div>

                    <!-- New Search Input -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-slate-400 mb-2">Cari</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari barang atau ID" 
                                class="bg-slate-800/50 border border-slate-600 text-white p-3 pl-10 rounded-lg w-full focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors">
                        </div>
                    </div>

                    <div class="flex gap-2 md:col-span-2">
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg transition-all duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('sales.index') }}" class="bg-slate-700 hover:bg-slate-600 text-slate-300 px-6 py-3 rounded-lg transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Sales Summary Cards -->
            @if($sales->count() > 0)
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-green-500/20 border border-green-500/30 rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-green-400 text-sm font-medium uppercase tracking-wider">Total Transaksi</div>
                                <div class="text-2xl font-bold text-green-300">{{ $sales->count() }}</div>
                            </div>
                            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-500/20 border border-blue-500/30 rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-blue-400 text-sm font-medium uppercase tracking-wider">Total Penjualan</div>
                                <div class="text-2xl font-bold text-blue-300">Rp {{ number_format($sales->sum('total'), 0, ',', '.') }}</div>
                            </div>
                            <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-purple-500/20 border border-purple-500/30 rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-purple-400 text-sm font-medium uppercase tracking-wider">Rata-rata</div>
                                <div class="text-2xl font-bold text-purple-300">Rp {{ number_format($sales->avg('total'), 0, ',', '.') }}</div>
                            </div>
                            <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Sales List -->
            <div class="space-y-6">
                @forelse ($sales as $sale)
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl overflow-hidden hover:bg-white/10 transition-colors">
                        <!-- Transaction Header -->
                        <div class="p-6 border-b border-white/10">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-white">Transaksi {{ $sale->id }}</h3>
                                       <p class="text-slate-400" id="realtime-time" data-time="{{ $sale->created_at->toIso8601String() }}">
                                            {{ $sale->created_at->format('d M Y - H:i') }}
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="text-right">
                                    <div class="grid grid-cols-3 gap-4 text-sm">
                                        <div class="bg-green-500/20 border border-green-500/30 rounded-lg p-3">
                                            <div class="text-green-400 text-xs uppercase tracking-wider">Total</div>
                                            <div class="text-green-300 font-bold">Rp {{ number_format($sale->total, 0, ',', '.') }}</div>
                                        </div>
                                        <div class="bg-blue-500/20 border border-blue-500/30 rounded-lg p-3">
                                            <div class="text-blue-400 text-xs uppercase tracking-wider">Dibayar</div>
                                            <div class="text-blue-300 font-bold">Rp {{ number_format($sale->paid, 0, ',', '.') }}</div>
                                        </div>
                                        <div class="bg-orange-500/20 border border-orange-500/30 rounded-lg p-3">
                                            <div class="text-orange-400 text-xs uppercase tracking-wider">Kembalian</div>
                                            <div class="text-orange-300 font-bold">Rp {{ number_format($sale->change, 0, ',', '.') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Items Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-white/5">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-slate-400 font-medium uppercase tracking-wider">Barang</th>
                                        <th class="text-center py-4 px-6 text-slate-400 font-medium uppercase tracking-wider">Qty</th>
                                        <th class="text-right py-4 px-6 text-slate-400 font-medium uppercase tracking-wider">Harga</th>
                                        <th class="text-right py-4 px-6 text-slate-400 font-medium uppercase tracking-wider">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/10">
                                    @foreach ($sale->saleItems as $item)
                                        <tr class="hover:bg-white/5 transition-colors">
                                            <td class="py-4 px-6">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-slate-700 rounded-lg flex items-center justify-center mr-3">
                                                        <svg class="w-4 h-4 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5zM10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                    <span class="text-white font-medium">{{ $item->item->nama_barang }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center py-4 px-6">
                                                <span class="bg-purple-500/20 border border-purple-500/30 text-purple-300 px-3 py-1 rounded-full text-sm font-medium">
                                                    {{ $item->quantity }}
                                                </span>
                                            </td>
                                            <td class="text-right py-4 px-6 text-slate-300 font-medium">
                                                Rp {{ number_format($item->price, 0, ',', '.') }}
                                            </td>
                                            <td class="text-right py-4 px-6 text-white font-bold">
                                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-12 text-center">
                        <div class="w-24 h-24 bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Transaksi</h3>
                        <p class="text-slate-400 mb-6">Tidak ada transaksi yang ditemukan untuk periode yang dipilih.</p>
                        <a href="{{ route('sales.create') }}" class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-6 py-3 rounded-lg transition-all duration-200 inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Buat Transaksi Baru
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination (if applicable) -->
            @if(method_exists($sales, 'links'))
                <div class="mt-8">
                    {{ $sales->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<style>
/* Custom scrollbar for webkit browsers */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: rgba(139, 92, 246, 0.5);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: rgba(139, 92, 246, 0.7);
}

/* Custom date input styling */
input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(1);
    cursor: pointer;
}
</style>

<script>
    function updateTime() {
        const el = document.getElementById('realtime-time');
        const time = el.getAttribute('data-time');
        const date = new Date(time);

        // Tambah waktu per detik
        date.setSeconds(date.getSeconds() + Math.floor((Date.now() - date.getTime()) / 1000));

        const options = {
            day: '2-digit',
            month: 'short',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        };

        el.textContent = new Intl.DateTimeFormat('id-ID', options).format(date);
    }

    setInterval(updateTime, 1000); // Update setiap detik
    updateTime(); // Panggil saat pertama kali
</script>

@endsection