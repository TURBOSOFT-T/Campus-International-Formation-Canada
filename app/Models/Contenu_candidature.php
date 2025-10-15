<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenu_candidature extends Model
{
    use HasFactory;

    protected $table ='contenu_cadidatures';
    protected $fillable = [
        'offre_id',
        'candidature_id',
       
    ];

    public function offres(){
        return $this->belongsTo(Offre::class ,'offre_id')->withDefault();
    }
    public function offre(){
        return $this->belongsTo(Offre::class ,'offre_id')->withDefault();
    }

    public function candidature(){
        return $this->belongsTo(Candidature::class ,'candidature_id');
    }
   
   
}
