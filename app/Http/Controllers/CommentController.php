<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CommentController extends Controller
{
    public function store(Request $request, Photo $photo)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'photo_id' => $photo->id,
            'content' => $request->input('content'),
        ]);

        return back();
    }
}
