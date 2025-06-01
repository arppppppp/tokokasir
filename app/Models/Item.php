<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
    protected $fillable = [
        'user_id',
        'nama_barang',
        'harga_modal',
        'harga_jual',
        'stok',
        'foto',
    ];

}
