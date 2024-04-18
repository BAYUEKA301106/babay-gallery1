<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Photo $photo)
    {
        $user = Auth::user();

        // Cek apakah pengguna sudah like, jika ya, hapus like. Jika tidak, tambahkan like.
        $like = Like::where('user_id', $user->id)
                    ->where('photo_id', $photo->id)
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $user->id,
                'photo_id' => $photo->id,
            ]);
        }

        return back();
    }
}
