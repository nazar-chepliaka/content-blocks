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
        Schema::create('content_blocks_types', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('value');
            $table->timestamps();
        });

        DB::table('content_blocks_types')->insert([
            ['slug' => 'text', 'value' => 'Текст'],
            ['slug' => 'console', 'value' => 'Команда'],
            ['slug' => 'code', 'value' => 'Код'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_blocks_types');
    }
};
