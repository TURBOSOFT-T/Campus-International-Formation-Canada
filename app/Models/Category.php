<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

   

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }

  public function images()
    {
        return $this->hasMany(Image::class, 'category_id', 'id');
    }
   
 

    public function sponsors()
{
    return $this->belongsToMany(Sponsor::class, 'category_sponsor');
}


    public function produits()
    {
        return $this->hasMany(produits::class, 'category_id', 'id');
    }

    public function formations()
    {
        return $this->hasMany(Formation::class, 'category_id', 'id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }

       public function offres()
    {
        return $this->hasMany(Offre::class, 'category_id', 'id');
    }
    public function events()
    {
        return $this->hasMany(Event::class, 'category_id', 'id');
    }
}
