<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use function compact;
use function dd;
use function response;
use function view;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::paginate(8);
        return view('welcome' , compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'albumName'=>['required' , 'string']
        ]);
        $album = Album::create([
            'name'=> $data['albumName']
        ]);
        if($request->has('file')){
            //request file is an array of files
            $this->handleRequestFiles($request , $album);
        }
        return 'www';
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $images = $album->images()->paginate(5);
        $imagesCount = $album->images()->count();
        return view('albums.show', compact('album' , 'images' , 'imagesCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $data = $request->validate([
            'albumName'=>['required' , 'string']
        ]);
        $album->update([
            'name'=> $data['albumName']
        ]);
        if($request->has('file')){
            //request file is an array of files
            $this->handleRequestFiles($request , $album);
        }
        return  response()->json([], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        return 'wwwww';
    }

    private function handleRequestFiles($request  , $album)
    {
        foreach ($request->file as $file){
            $filePath = $file->storePublicly('images', 'public');
            $fileName = $file->getClientOriginalName();
            $album->images()->create([
                'name'=>$fileName ,
                'path'=>$filePath,
                'album_id'=>$album->id
            ]);
        }
    }
}
