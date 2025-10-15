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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
             $table->string('nom');
          //  $table->string('tags')->nullable();
            $table->text('description')->nullable();
             $table->text('meta_description')->nullable();
            //$table->string('reference')->unique();
              $table->unsignedBigInteger("user_id")->nullable();
            $table->string('image')->nullable();
              $table->string('photo')->nullable();
                $table->unsignedBigInteger("category_id")->nullable();
          
            $table->enum("statut",["disponible","indisponible"])->default("indisponible");
            $table->json('photos')->nullable();
            $table->boolean('top')->default(false);
             $table->boolean('active')->default(false);
            $table->softDeletes();
             $table->enum("type",["stage","job"])->default("stage");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
