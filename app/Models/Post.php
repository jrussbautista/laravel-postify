<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'category_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }


    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function getFavoritedAttribute() {
        return $this->favorites->contains('user_id', auth()->id());
    }

    public function favoritedBy(User $user){
       return $this->favorites->contains('user_id', $user->id);
    }

    public function latestComments() {
        return $this->comments()->latest()->limit(5);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
