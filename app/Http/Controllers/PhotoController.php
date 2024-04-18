<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('photos.all', compact('albums'));
    }


    // public function show(Album $album)
    // {
    //     // Menggunakan model binding, tidak perlu mencari ulang dengan findOrFail
    //     if (!$album) {
    //         abort(404); // Atau handle sesuai kebutuhan Anda
    //     }

    //     return view('albums.show', compact('album'));
    // }
}
