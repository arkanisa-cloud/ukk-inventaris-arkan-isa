<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_code_sequences', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('last_number')->default(0);
        });

        DB::table('item_code_sequences')->insert([
            'id' => 1,
            'last_number' => 0
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_code_sequences');
    }
};
