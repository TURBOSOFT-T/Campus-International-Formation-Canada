<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    use HasFactory;
    protected $table = 'configs';

    protected $fillable = [
        'logo',
        'logoHeader',
        'telephone',
        'telephone1',
        'localisation',
        'addresse',
        'email',
        'description',
        'frais',
        'icon',
        'logocontact',
        'imagecontact',
        'imageevent',
        'imageformation',
        'facebook',
        'messenger',
        'twitter',
        'instagram',
        'youtube',
        'linkedin',
        'tiktok',

        'fax',
        'twitter',
        'adherent',
        'coach',
        'seance',
        'tounoir',
        'des_apropos',
        'photos',
        'image_apropos',
        'titre_apropos',
        'image1_apropos',

        'texte',
        'texte1',
        'texte2',
        'texte3',
        'imageblog',
        'imageoffre',
        'imageenteteabout',

        'image1_home',
        'image2_home',
        'image1_home',
        'image2_home',
        'titre_home',
        'sous_titre_home',
        'des_home',
        'biographie',

        'imageenteteservice',
        'image_apropos1',
        'image1_apropos1',
        'image2_apropos1',
        'image3_apropos1',
        'explication',
        'explication1',
        'explication2',
        'explication3',
        'explication4',
        'explication5',


        'question',
        'question1',
        'question2',
        'reponse',
        'reponse1',
        'reponse2',
        'note',
        'note1',
        'note2',
        'note3',
        'note4',
        'note5',
        'des_apropos1',
        'experience',
        'client',
        'pourcetage',
        'sponsor',
        'projet',

    ];
}
