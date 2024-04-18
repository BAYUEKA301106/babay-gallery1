<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function index()
    {
       // Mendapatkan ID pengguna yang saat ini masuk
       $userId = auth()->id();

       // Menampilkan album yang diunggah oleh pengguna yang saat ini masuk
       $albums = Album::where('user_id', $userId)->paginate(6);
       // $albums = Album::paginate(6); // Change 10 to your desired number of items per page

       return view('albums.index', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function show(Album $album)
    {
        // Menggunakan model binding, tidak perlu mencari ulang dengan findOrFail
        if (!$album) {
            abort(404); // Atau handle sesuai kebutuhan Anda
        }

        return view('albums.show', compact('album'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'required|image|max:1999',
            'description' => 'required',

        ]);

        // Upload dan simpan gambar
        $fileNameToStore = $this->uploadImage($request->file('cover_image'));

        // Buat album baru
        Album::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'cover_image' => $fileNameToStore,
            'user_id' => auth()->id(),
        ]);

        return redirect('/albums')->with('success', 'Album created');
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);


        if ($album->user_id !== auth()->id()) {
            return back()->with('danger', 'You are not authorized to delete this album');
        }
        // Delete the image associated with the album
        if ($album->cover_image != 'noimage.jpg') {
            Storage::delete('public/album_covers/' . $album->cover_image);
        }

        // Delete the album
        $album->delete();

        // Remove symbolic link to the storage directory
        Storage::deleteDirectory('public/album_covers/' . $id);

        return redirect('/albums')->with('success', 'Album deleted');
    }


    // Fungsi untuk mengupload gambar
    private function uploadImage($image)
    {
        $filenameWithExt = $image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        $path = $image->storeAs('public/album_covers', $fileNameToStore);

        return $fileNameToStore;
    }

}
