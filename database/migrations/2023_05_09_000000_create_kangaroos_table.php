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
        Schema::create('t_kangaroos', function (Blueprint $table) {
            $table->unsignedInteger('kangaroo_id', true)->unique();
            $table->string('name', 45)->unique()->nullable(false);
            $table->string('nickname', 45)->nullable();
            $table->unsignedDecimal('weight', 8, 2)->nullable(false);
            $table->unsignedDecimal('height', 8, 2)->nullable(false);
            $table->enum('gender', ['M', 'F', ]);
            $table->string('color', 45)->nullable();
            $table->boolean('is_friendly')->nullable();
            $table->date('birth_date')->nullable(false);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kangaroos');
    }
};
