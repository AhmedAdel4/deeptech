<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    public $fillable = ['title', 'description','opening_speech'];

    public function getMainImage()
    {
        return $this->media()->where('attribute', "detail_image")->first();
    }
}
