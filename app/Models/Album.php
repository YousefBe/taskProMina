<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function asset;
use function public_path;

class Album extends Model
{
    use HasFactory;

    protected $appends = [
        'albumCover',
        'imagesCount',
    ];
    protected $fillable = [
        'name',
        'path',
        'album_id'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getAlbumCoverAttribute()
    {
        if ($this->images()->first()) {
            return asset('storage/' . $this->images()->first()->path);
        }
        return 'https://ionicframework.com/docs/img/demos/thumbnail.svg';
    }

    public function getImagesCountAttribute()
    {
        return $this->images()->count();
    }
}
