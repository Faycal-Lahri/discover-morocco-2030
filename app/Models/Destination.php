<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'nom', 'titre', 'description', 'label', 'gps_location', 'image', 'video'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function categories()
    {
        return $this->hasMany(DestinationCategory::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function paragraphs()
    {
        return $this->hasMany(DestinationParagraph::class);
    }

    public function destinationImages()
    {
        return $this->hasMany(DestinationImage::class);
    }
}
