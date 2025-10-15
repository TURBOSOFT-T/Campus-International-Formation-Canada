<?php

use App\Models\config;
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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable()->default(null);
            $table->string('logoHeader')->nullable()->default(null);
            $table->string('telephone')->nullable()->default(null);
            
              $table->string('telephone1')->nullable()->default(null);
            $table->string('addresse')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->longText('localisation')->nullable();
            $table->text('description')->nullable()->default(null);

            $table->longText('biographie')->nullable();
            $table->string('icon')->nullable()->default(null);

            $table->integer("adherent")->nullable();
            $table->integer("coach")->nullable();
            $table->integer("tounoir")->nullable();
            $table->integer("seance")->nullable();


            $table->integer("experience")->nullable();
            $table->integer("client")->nullable();
            $table->integer("pourcetage")->nullable();
            $table->integer("sponsor")->nullable();
            $table->integer("projet")->nullable();


            $table->string("logocontact")->nullable();
            $table->string("imagecontact")->nullable();

            $table->string("imageevent")->nullable();
            $table->string("imageformation")->nullable();

            $table->string("imageblog")->nullable();
             $table->string("imageoffre")->nullable();
            $table->string("imageenteteabout")->nullable();
            $table->string("imageenteteservice")->nullable();

            $table->string("facebook")->nullable();
             $table->string("messenger")->nullable();
            $table->string("twitter")->nullable();
            $table->string("instagram")->nullable();
            $table->string("youtube")->nullable();
            $table->string("linkedin")->nullable();
            $table->string("tiktok")->nullable();
            $table->string("fax")->nullable();

            //////section 1
            $table->text('titre_apropos')->nullable();
            $table->text('des_apropos')->nullable();
            $table->string('image_apropos')->nullable();
            $table->string('image1_apropos')->nullable();
            $table->string('texte')->nullable();
            $table->string('texte1')->nullable();
            $table->string('texte2')->nullable();
            $table->string('texte3')->nullable();



            $table->text('slogan_apropos')->nullable();
            $table->text('slogan1_apropos')->nullable();
            ////////section 2
            $table->text('titre_apropos1')->nullable();
            $table->text('des_apropos1')->nullable();
            $table->string('image_apropos1')->nullable();
            $table->string('image1_apropos1')->nullable();
            $table->string('image2_apropos1')->nullable();
            $table->string('image3_apropos1')->nullable();
            ////////section 3
            $table->text('titre_apropos2')->nullable();
            $table->text('des_apropos2')->nullable();
            $table->string('image_apropos2')->nullable();
            $table->text('question')->nullable();
            $table->text('question1')->nullable();
            $table->text('question2')->nullable();
            $table->text('reponse')->nullable();
            $table->text('reponse1')->nullable();
            $table->text('reponse2')->nullable();

            // $table->string('photos')->nullable();
            $table->longText('photos')->nullable();
            // $table->enum("gender",["FEMALE","MALE"])->default("MALE");

            $table->string('image1_home')->nullable();
            $table->string('image2_home')->nullable();
            $table->string('image3_home')->nullable();
            $table->string('image4_home')->nullable();
            $table->string('titre_home')->nullable();
            $table->text('sous_titre_home')->nullable();
            $table->text('des_home')->nullable();
            $table->string('note')->nullable();
            $table->string('note1')->nullable();
            $table->string('note2')->nullable();
            $table->string('note3')->nullable();
            $table->string('note4')->nullable();
            $table->string('note5')->nullable();


            $table->timestamps();
        });


        // $config = new config();
        // $config->logo=null;
        // $config->save();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
