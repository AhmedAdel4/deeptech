<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutUs extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    public $fillable = ['details', 'opening_speech', 'main_title'];

    public function getMainImage()
    {
        return $this->media()->where('attribute', "detail_image")->first();
    }

    public function getAboutMedia()
    {
        return $this->media()->where('attribute', "main_images")->get();
    }
}
