<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
    {
    public function index()
    {
        $items = Item::where('user_id', Auth::id())->get();
        $totalItems = $items->count();
        $totalModal = $items->sum('harga_modal');
        $potensiKeuntungan = $items->sum(function ($item) {
            return ($item->harga_jual * $item->stok) - ($item->harga_modal);
        });
        return view('items.index', compact('items', 'totalItems', 'totalModal', 'potensiKeuntungan'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_modal' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads/items', 'public');
            $data['foto'] = $fotoPath;
        }

        Item::create($data);

        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan!');
    }

    public function edit(Item $item)
    {
        $this->authorizeItem($item);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $this->authorizeItem($item);

        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            'nama_barang' => 'required|string|max:255',
            'harga_modal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('foto')) {
            if ($item->foto) {
                Storage::disk('public')->delete($item->foto);
            }
            $item->foto = $request->file('foto')->store('foto_item', 'public');
        }

        $item->update([
            'nama_barang' => $request->nama_barang,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,

        ]);

        return redirect()->route('items.index')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy(Item $item)
    {
        $this->authorizeItem($item);

        if ($item->foto) {
            Storage::disk('public')->delete($item->foto);
        }

        $item->delete();
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus');
    }

    protected function authorizeItem(Item $item)
    {
        abort_unless($item->user_id === Auth::id(), 403);
    }
}
