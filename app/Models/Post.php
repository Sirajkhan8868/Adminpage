<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['user_id', 'category_id', 'title', 'description', 'status'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    //relation create post and categories

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //retation create user to post

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
