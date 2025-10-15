<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

     protected $table = 'candidatures';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'adresse',
        'cv',
        'file',
        'note',
        'avatar',

            "phone",
           
            "pays",
            "ville",
           
        'password',
        'user_id',
        'offre_id'

        
    ];



    public function contenus()
    {
        return $this->hasMany(Contenu_candidature::class, 'candidature_id');
    }


    public function client(){
        return $this->belongsTo(clients::class, 'phone','phone');
    }

    public function modifiable(){
        if ($this->statut === 'retournée' || $this->statut === 'payée' || $this->statut === 'livrée') {
            return false;
        } else {
            return true;
        }
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
