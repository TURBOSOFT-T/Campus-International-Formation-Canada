<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
      
         'description',
      'meta_description',
        'image',
     //   'category_id',
    
        'lien',
        'telephone',
        'email',
        'logo'
    ];

  public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}
     public function categories()
{
    return $this->belongsToMany(Category::class, 'category_sponsor');
}

   
}
