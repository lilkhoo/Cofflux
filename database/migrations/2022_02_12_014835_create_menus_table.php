<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('namamenu');
            $table->foreignId('category_id');
            $table->foreignId('pegawai_id');
            $table->string('slug')->unique();
            $table->integer('harga');
            $table->string('deskripsi');
            $table->string('ketersediaan');
            $table->timestamp('made_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};