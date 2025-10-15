<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
     'formation_id',
        'nom',
        'prenom',
        'addresse',
        'ville',
        'message',
        'telephone',
      
        'email',
        'staut',
        'etat',
        'mode',
        'note',
        'user_id',
        'event_id',
        'type',
        'country_id',
        'state_id',
        'city_id',
    ];

        public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }

    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }

     public function formation()
    {
        return $this->belongsTo(Formation::class , 'formation_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class , 'event_id', 'id');
    }
 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function contenus()
    {
        return $this->hasMany(Contenu_Inscription::class, 'inscription_id');
    }

}
