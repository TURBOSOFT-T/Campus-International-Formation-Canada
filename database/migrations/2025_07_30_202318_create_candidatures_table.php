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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->enum("statut", ['créé', 'traitement', 'vue','confirmée','rejetée'])->default('créé');
              $table->enum("etat",["attente","confirmé","annulé"])->default("attente") ;
            $table->text("note")->nullable()->default(null);
            $table->string("nom")->nullable();
            $table->string("prenom")->nullable();
              $table->string("cv")->nullable();
                $table->string('file')->nullable(); 
               $table->string('file_path')->nullable();
            $table->string("adresse")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("pays")->nullable();
            $table->string("ville")->nullable();
           
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
             $table->unsignedBigInteger('offre_id')->nullable()->default(null);
           
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
