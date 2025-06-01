@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Item - Toko Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-purple': '#2D1B69',
                        'deep-purple': '#1E1042',
                        'accent-purple': '#8B5CF6'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #1E1042 0%, #2D1B69 50%, #4C1D95 100%);
            min-height: 100vh;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glass-card {
            background: rgba(30, 16, 66, 0.3);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(139, 92, 246, 0.3);
        }
        
        .hover-glow:hover {
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.4);
            transform: translateY(-2px);
        }
        
        .button-primary {
            background: linear-gradient(135deg, #8B5CF6 0%, #A855F7 100%);
            transition: all 0.3s ease;
        }
        
        .button-primary:hover {
            background: linear-gradient(135deg, #7C3AED 0%, #9333EA 100%);
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.4);
        }
        
        .button-danger {
            background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
            transition: all 0.3s ease;
        }
        
        .button-danger:hover {
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.4);
        }
        
        .button-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }
        
        .button-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
        }
        
        .table-row:hover {
            background: rgba(139, 92, 246, 0.1);
        }
        
        .success-alert {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(22, 163, 74, 0.2) 100%);
            border: 1px solid rgba(34, 197, 94, 0.3);
            backdrop-filter: blur(10px);
        }
        
        .empty-state {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 2px dashed rgba(139, 92, 246, 0.3);
        }
        
        .image-placeholder {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.3) 0%, rgba(168, 85, 247, 0.3) 100%);
            border: 1px solid rgba(139, 92, 246, 0.4);
        }
        
        .profit-badge {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body class="font-sans text-white">
    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card rounded-2xl shadow-2xl overflow-hidden">
                <div class="p-8">
                    <!-- Header Section -->
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-8">
                        <div class="mb-4 sm:mb-0">
                            <h1 class="text-3xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">
                                Daftar Item
                            </h1>
                            <p class="text-purple-200 mt-2">Kelola semua item produk Anda</p>
                        </div>
                        <a href="{{ route('items.create') }}" class="button-primary text-white px-6 py-3 rounded-lg font-semibold shadow-lg hover-glow transition-all duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Item
                        </a>
                    </div>

                    <!-- Success Alert -->
                    <div class="success-alert rounded-lg p-4 mb-6 hidden" id="success-alert">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-green-300 font-medium">Item berhasil disimpan!</span>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="glass-effect rounded-xl overflow-hidden shadow-xl" id="items-table">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-purple-500/30">
                                <thead class="bg-gradient-to-r from-purple-600/30 to-purple-700/30">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-purple-200 uppercase tracking-wider">Foto</th>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-purple-200 uppercase tracking-wider">Nama Item</th>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-purple-200 uppercase tracking-wider">Harga Modal</th>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-purple-200 uppercase tracking-wider">Harga Jual</th>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-purple-200 uppercase tracking-wider">Stok</th>
                                        <th class="px-6 py-4 text-right text-xs font-medium text-purple-200 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($items as $item)
                                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="h-16 w-16">
                                                    @if ($item->foto)
                                                        <img class="h-16 w-16 rounded-lg object-cover shadow-sm border border-gray-200"
                                                            src="{{ Storage::url($item->foto) }}"
                                                            alt="{{ $item->nama_barang }}">
                                                    @else
                                                        <div class="h-16 w-16 rounded-lg bg-gray-100 flex items-center justify-center border border-gray-200">
                                                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $item->nama_barang }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 font-mono">
                                                    Rp {{ number_format($item->harga_modal, 0, ',', '.') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 font-mono font-semibold">
                                                    Rp {{ number_format($item->harga_jual, 0, ',', '.') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 font-mono">
                                                    {{ $item->stok }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex items-center space-x-2">
                                                    <a href="{{ route('items.edit', $item->id) }}"
                                                    class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                onclick="return confirm('Yakin ingin menghapus item {{ $item->nama_barang }}?')"
                                                                class="inline-flex items-center px-3 py-1.5 border border-red-300 shadow-sm text-xs font-medium rounded-md text-red-700 bg-white hover:bg-red-50 transition">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <div class="glass-effect rounded-xl p-6 hover-glow transition-all duration-300">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-purple-200 text-sm">Total Item</p>
                                    <p class="text-white text-2xl font-bold">{{ $totalItems }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="glass-effect rounded-xl p-6 hover-glow transition-all duration-300">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-purple-200 text-sm">Total Modal</p>
                                    <p class="text-white text-2xl font-bold">Rp {{ number_format($totalModal, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="glass-effect rounded-xl p-6 hover-glow transition-all duration-300">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-purple-200 text-sm">Potensi Keuntungan</p>
                                    <p class="text-white text-2xl font-bold">Rp {{ number_format($potensiKeuntungan, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @endsection