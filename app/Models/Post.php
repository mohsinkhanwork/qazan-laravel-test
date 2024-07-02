<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\PostCreated;
use App\Models\User;


class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_id', 'is_published', 'published_at'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scoreByAuthor($query, $authorId)
    {
        return $query->where('author_id', $authorId);
    }

    protected static function booted()
    {
        static::created(function ($post) {
            event(new PostCreated($post));
        });
    }
}
