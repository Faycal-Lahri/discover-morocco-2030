<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'titre', 'size', 'description', 'label', 'image', 'video'];

    public function categories()
    {
        return $this->hasMany(CityCategory::class);
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function paragraphs()
    {
        return $this->hasMany(CityParagraph::class);
    }
}
