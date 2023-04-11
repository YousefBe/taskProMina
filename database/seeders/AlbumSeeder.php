<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $booksAlbum = Album::create(['name' => 'Books']);
        $productsAlbum = Album::create(['name' => 'Products']);
        $usersAlbum = Album::create(['name' => 'Users']);
    }
}
