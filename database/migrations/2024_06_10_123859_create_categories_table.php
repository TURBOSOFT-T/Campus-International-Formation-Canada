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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
             $table->string('couverture')->nullable();
             $table->string('site_url')->nullable();
 $table->boolean('link')->default(false);
  $table->boolean('top')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
