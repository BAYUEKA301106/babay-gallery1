<?php

namespace App\Models;
// use App/Models/Comment;
use App\Models\Album;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'title', 'description', 'image','user_id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
    public function photoComments(){
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Like(){
        return $this->hasOne(Like::class);
    }
}
