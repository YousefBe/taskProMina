<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookImages=['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png','11.png','12.png'];
        $productImages=['13.png','14.png','15.png','16.png','17.png','18.png','19.png','20.png','21.png','22.png','23.png','24.png'];
        $usersImages =['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg','11.jpg','12.jpg'];
        foreach ($bookImages as $index =>$bookImage){
            Image::create([
                'name'=>'Book-'.$index,
                'path'=>'images/'.$bookImage,
                'album_id'=>1,
            ]);
        }
        foreach ($productImages as $index =>$productImage){
            Image::create([
                'name'=>'Product-'.$index,
                'path'=>'images/'.$productImage,
                'album_id'=>2,
            ]);
        }
        foreach ($usersImages as $index =>$usersImage){
            Image::create([
                'name'=>'User-'.$index,
                'path'=>'images/'.$usersImage,
                'album_id'=>3,
            ]);
        }
    }
}
