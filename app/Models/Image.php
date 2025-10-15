<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        
        'description',
        'image',
        'category_id',
        'service_id'
    ];
   
  public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

      public function images()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
