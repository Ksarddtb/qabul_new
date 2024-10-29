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
        Schema::create('edu_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        DB::table('edu_forms')->insert([
            ['name' => 'Kunduzgi'],
            ['name' => 'Sirtqi'],
            ['name' => 'Kunduzgi (online)'],
            ['name' => 'Kechki'],
            ['name' => 'Kunduzgi masofaviy'],
            ['name' => 'Masofaviy'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edu_forms');
    }
};
