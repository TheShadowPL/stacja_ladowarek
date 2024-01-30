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
        if (!Schema::hasTable('ladowarki')) {
            Schema::create('ladowarki', function ($table) {
                $table->id();
                $table->string('city');
                $table->string('street');
                $table->string('number');
                $table->string('comment')->nullable();
                $table->string('status');
                $table->string('closestTerm_time')->nullable();
                $table->string('closestTerm_date')->nullable();
                $table->string('standard');
                $table->decimal('power', 8, 2);
                $table->decimal('price', 8, 2);
                $table->string('locked')->default('false');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
