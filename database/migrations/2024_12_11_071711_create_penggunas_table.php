<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('nama', 100);
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->string('no_hp', 20);
            $table->text('alamat');
            $table->enum('role', ['pelanggan', 'pemilik_laundry']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};