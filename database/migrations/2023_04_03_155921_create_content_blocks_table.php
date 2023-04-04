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
        Schema::create('content_blocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_blocks_type_id');
            $table->foreign('content_blocks_type_id', 'id_of_content_blocks_type')->references('id')->on('content_blocks_types')->constrained('content_blocks_types')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'id_of_post')->references('id')->on('posts')->constrained('posts')->onUpdate('cascade')->onDelete('cascade');
            $table->mediumText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_blocks');
    }
};
