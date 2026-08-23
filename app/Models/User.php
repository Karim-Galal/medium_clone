<?php

namespace App\Models;
use App\Models\Post;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'image',
        'bio',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }


    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function isFollowedBy(User $user) {

      return $this->followers()->where('follower_id', $user->id)->exists();
    }

    public function likes () {

      return $this->hasMany(Like::class);
    }

    public function hasLiked(Post $post) {

      return $post->likes()->where('user_id', $this->id)->exists();

    }


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatars')
            ->useDisk('public')
            ->singleFile();



    }

    public function registerMediaConversions(?Media $media = null): void
      {
          $this
              ->addMediaConversion('thumb')
              ->width(128)
              ->height(128)
              ->crop( 128, 128)
              ->nonQueued();
      }

    public function imageUrl()
    {
        $media = $this->getFirstMedia('avatars');

        if ($media) {
            // return thumbnail if available
            if ($media->hasGeneratedConversion('thumb')) {
                return $media->getUrl('thumb');
            }

            // fallback: return original
            return $media->getUrl();
        }

        // fallback if no avatar at all
        // return asset('images/default-avatar.png');
        return 'https://dummyimage.com/32/9af4ac/gray&text='.mb_substr(trim($this->name ), 0,1);
    }


}
