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
        // Tambah kolom user_id ke tabel bookings_laboratorium_ilmu_ekonomi
        Schema::table('bookings_laboratorium_ilmu_ekonomi', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->onDelete('cascade');
        });

        // Tambah kolom user_id ke tabel bookings_laboratorium_ilmu_keuangan_perbankan
        Schema::table('bookings_laboratorium_ilmu_keuangan_perbankan', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->onDelete('cascade');
        });

        // Tambah kolom user_id ke tabel bookings_laboratorium_ekonomi_islam
        Schema::table('bookings_laboratorium_ekonomi_islam', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus kolom user_id dari tabel bookings_laboratorium_ilmu_ekonomi
        Schema::table('bookings_laboratorium_ilmu_ekonomi', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        // Hapus kolom user_id dari tabel bookings_laboratorium_ilmu_keuangan_perbankan
        Schema::table('bookings_laboratorium_ilmu_keuangan_perbankan', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        // Hapus kolom user_id dari tabel bookings_laboratorium_ekonomi_islam
        Schema::table('bookings_laboratorium_ekonomi_islam', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};