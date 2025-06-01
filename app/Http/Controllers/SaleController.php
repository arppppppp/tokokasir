<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Sale::query();

        // Filter transaksi hanya milik user login
        $query->where('user_id', Auth::id());

        // Filter tanggal (optional)
        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }
        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        // Filter search (misal cari berdasarkan ID transaksi atau nama barang)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%$search%")
                // Jika mau search nama barang, perlu join atau relasi
                ->orWhereHas('saleItems.item', function($q2) use ($search) {
                    $q2->where('nama_barang', 'like', "%$search%");
                });
            });
        }

        // Ambil hasil dengan relasi saleItems dan item agar di view bisa diakses
        $sales = $query->with('saleItems.item')->latest()->paginate(10);

        return view('sales.index', compact('sales'));
    }
    public function create()
    {
        $items = Item::where('user_id', Auth::id())->get();
        return view('sales.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|exists:items,id',
            'items.*.qty' => 'required|integer|min:1',
            'paid' => 'required|numeric|min:0',
        ]);

        // Mulai transaction DB supaya aman rollback kalau error
        DB::beginTransaction();

        try {
            $total = 0;
            $saleItemsData = [];

            foreach ($request->items as $itemData) {
                $item = Item::where('id', $itemData['id'])
                            ->where('user_id', Auth::id())
                            ->lockForUpdate() // Lock stok saat proses
                            ->first();

                if (!$item) {
                    return back()->withErrors(['msg' => 'Barang tidak ditemukan atau bukan milik Anda'])->withInput();
                }

                if ($item->stok < $itemData['qty']) {
                    return back()->withErrors(['msg' => "Stok barang '{$item->nama_barang}' tidak cukup."])->withInput();
                }

                $subtotal = $item->harga_jual * $itemData['qty'];
                $total += $subtotal;

                $saleItemsData[] = [
                    'item_id' => $item->id,
                    'quantity' => $itemData['qty'],
                    'price' => $item->harga_jual,
                    'subtotal' => $subtotal,
                ];

                // Kurangi stok
                $item->stok -= $itemData['qty'];
                $item->save();
            }

            if ($request->paid < $total) {
                return back()->withErrors(['msg' => 'Uang yang diberikan kurang dari total pembayaran'])->withInput();
            }

            // Simpan transaksi
            $sale = new Sale();
            $sale->user_id = Auth::id();
            $sale->total = $total;
            $sale->paid = $request->paid;
            $sale->change = $request->paid - $total;
            $sale->save();

            // Simpan detail barang yang terjual
            foreach ($saleItemsData as $data) {
                $sale->saleItems()->create($data);
            }

            DB::commit();

            return redirect()->route('sales.create')->with('success', 'Transaksi berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Terjadi kesalahan saat menyimpan transaksi: ' . $e->getMessage()])->withInput();
        }
    }
}
