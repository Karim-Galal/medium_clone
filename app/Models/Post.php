<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
      "title",
      'slug',
      'content',
      'image',
      'category_id',
      'user_id',
      'published_at',
    ];

    public function category() {
      return $this->belongsTo(Category::class);
    }
    public function user() {
      return $this->belongsTo(User::class);
    }

    public function readTime()
    {
        $minutes = max(1, ceil(str_word_count(strip_tags($this->content)) / 200));
        return $minutes . ' min read';
    }

    public function likes() {
      return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
      return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('posts') // collection name
            ->useDisk('public')           // storage disk
            ->singleFile();              // keep only the latest file

           // ->useFallbackUrl('/images/default-post.png')
            // ->useFallbackPath(public_path('images/default-post.png'))


    }

    public function registerMediaConversions(?Media $media = null): void
    {

        $this
            -> addMediaConversion('preview')
            -> width(400)
            ->nonQueued();

    }

    public function imageUrl() {
      return $this-> getFirstMedia('posts')?-> getUrl();
    }
}
