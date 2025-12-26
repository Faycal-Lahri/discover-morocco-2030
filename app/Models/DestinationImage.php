<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'image',
        'caption'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
