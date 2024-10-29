<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * O'qishga kirish
     * O'qishni 2-kursga ko'chirish
     * 1-kurs 2 semester (2022-2023)
     * 2-kurs 2 semester (2022-2023)
     * O'qishni 3-kursga ko'chirish
     * 1-kurs 2 semester
     * 2-kurs 2 semester
     * O'qishni 4-kursga ko'chirish
     */
    public function up(): void
    {
        Schema::create('application_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        DB::table('application_types')->insert([
            ['name' => 'O\'qishga kirish'],
            ['name' => 'O\'qishni 2-kursga ko\'chirish'],
            ['name' => '1-kurs 2 semester (2022-2023)'],
            ['name' => '2-kurs 2 semester (2022-2023)'],
            ['name' => 'O\'qishni 3-kursga ko\'chirish'],
            ['name' => '1-kurs 2 semester'],
            ['name' => '2-kurs 2 semester'],
            ['name' => 'O\'qishni 4-kursga ko\'chirish'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_types');
    }
};
