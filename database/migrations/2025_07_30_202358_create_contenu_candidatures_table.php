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
        Schema::create('contenu_candidature', function (Blueprint $table) {
            $table->id();

             $table->unsignedBigInteger('cadidature_id');
            $table->unsignedBigInteger('offre_id')->nullable();
     

            //relation
          //  $table->foreign('candidature_id')->references('id')->on('candidatures')->onDelete('cascade');
         //   $table->foreign('offrd_id')->references('id')->on('offres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenu_candidature');
    }
};
