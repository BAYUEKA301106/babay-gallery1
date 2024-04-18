<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PhotosController extends Controller
{
    //
    public function create(int $album_id)
    {
    // Temukan album berdasarkan ID
    $album = Album::findOrFail($album_id);

    // Periksa apakah pengguna saat ini adalah pemilik album
    if ($album->user_id !== auth()->id()) {
        return redirect('/albums')->with('danger', 'You are not authorized to add photos to this album');
    }

        return view('photos.create', compact('album_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'required|image|max:1999',
            'description' => 'required',
            'album_id' => 'required|exists:albums,id'

        ]);
        $album = Album::findOrFail($request->input('album_id'));
        if ($album->user_id !== auth()->id()) {
            return redirect('/albums')->with('danger', 'You are not authorized to add photos to this album');
        }


        // Get filename with extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();

        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get just extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        // Filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        // Upload image
        $path = $request->file('photo')->storeAs('public/albums/'. $request->input('album_id') ,$fileNameToStore);
// dd($path);
        // Create photo
        $photo = new Photo;
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->album_id = $request->input('album_id');
        $photo->photo = $fileNameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->save();

        return redirect('/albums/' . $request->input('album_id'))->with('success', 'Photo created');
    }

    public function show(Photo $photo)
    {
        $photo = Photo::findOrFail($photo->id);
        return view('photos.show', compact('photo'));
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $album = $photo->album;
        if ($album->user_id !== auth()->id() && $photo->user_id !== auth()->id()) {
            return redirect('/albums/' . $album->id)->with('danger', 'You are not authorized to delete this photo');
        }
        $photo->delete();
        return redirect('/albums/' . $photo->album_id)->with('success', 'Photo deleted');
         // Remove symbolic link to the storage directory
        Storage::deleteDirectory('/albums/' .$photo->album.'/'. $id);
    }
}
