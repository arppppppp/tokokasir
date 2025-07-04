<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    protected $fillable = [
    'item_id',
    'quantity',
    'price',
    // atribut lain jika ada
    ];
}
