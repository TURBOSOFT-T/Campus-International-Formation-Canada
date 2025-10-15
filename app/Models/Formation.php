<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'image',
        'date_debut',
        'date_fin',
        'category_id',
    ];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function online_classes()
    {
        return $this->hasMany(Online_classe::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
