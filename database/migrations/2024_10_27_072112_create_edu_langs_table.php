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
        Schema::create('edu_langs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        DB::table('edu_langs')->insert([
            ['name' => 'Uzbek'],
            ['name' => 'Russian'],
            ['name' => 'English'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edu_langs');
    }
};
