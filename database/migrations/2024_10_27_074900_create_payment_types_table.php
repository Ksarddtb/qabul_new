<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations
     * Tasdiqlanmagan
     * Naqt
     * Payme
     * Bank
     * to'langan
     * qaytarilgan
     * Click online
     * Payme online
     * Paynet online
     * DTM
     * Tasdiqlash
 */
    public function up(): void
    {
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');

        });
        DB::table('payment_types')->insert([
            ['name' => 'Tasdiqlanmagan'],
            ['name' => 'Naqt'],
            ['name' => 'Payme'],
            ['name' => 'Bank'],
            ['name' => 'to\'langan'],
            ['name' => 'qaytarilgan'],
            ['name' => 'Click online'],
            ['name' => 'Paynet online'],
            ['name' => 'Paynet online'],
            ['name' => 'DTM'],
            ['name' => 'Tasdiqlash'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_types');
    }
};
