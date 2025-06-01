<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('items', function (Blueprint $table) {
        $table->integer('stok')->default(0)->after('harga_jual'); // tambahkan stok setelah harga_jual
    });
}

public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->dropColumn('stok');
    });
}
};
