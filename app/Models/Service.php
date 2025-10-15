<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
    
        'nom',
        'description',
      'meta_description',
        'image',
        'category_id'
    
        ];

        
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
      
      public function images()
    {
        return $this->hasMany(Image::class, 'service_id', 'id');
    }
}
