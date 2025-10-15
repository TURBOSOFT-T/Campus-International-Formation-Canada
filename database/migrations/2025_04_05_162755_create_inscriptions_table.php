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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();


            $table->enum("statut", ['créé', 'attente', 'traitement', 'payée', 'planification', 'retournée'])->default('attente');

            $table->enum("mode", ["espèce", "paypal", "carte de credit"])->default("espèce");
            $table->enum("etat", ["attente", "confirmé", "annulé"])->default("attente");
            $table->enum("type",["Formation","Event"])->default("Event");

            $table->text("note")->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('formation_id')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('telephone')->nullable()->default(null);
            $table->string('addresse')->nullable()->default(null);
            $table->string('ville')->nullable()->default(null);
            $table->string('message')->nullable()->default(null);

             $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
