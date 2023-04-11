<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'album_id'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
