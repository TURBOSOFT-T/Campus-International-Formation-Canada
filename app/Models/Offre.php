<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [

        'nom',
        'description',
        'meta_description',
        'type',
        'active',

        'photo',

        'category_id',

        'statut',
        'photos',
  'user_id',
        'top',
        'photo',
        'image'
    ];
    protected $casts = [
        'photos' => 'json',
    ];


 public function candidatures()
    {
        return $this->hasMany(Contenu_candidature::class, 'offre_id');
    }


  public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function vues()
    {
        return $this->hasMany(views::class, 'offre_id');
    }




    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
