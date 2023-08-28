<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use InteractsWithMedia;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFullUrlAttribute()
    {
        return url('categories/' . $this->slug);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
}
