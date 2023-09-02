<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Mews\Purifier\Casts\CleanHtml;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtmlInput;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use Sluggable;

    protected $with = [
        'category',
        'user',
        'comments'
    ];

    protected $casts = [
        'content'            => CleanHtml::class,
        'description'        => CleanHtml::class,
    ];

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

    public function scopeFilter($query, array $filters)
    {
        // Search for status
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query
                ->where('content', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
        );

        // Search for username per post
        $query->when($filters['user'] ?? false, fn ($query, $user) =>
        $query
            ->whereHas('user', fn ($query) =>
            $query->where('username', $user)));

        // Search for username per post
        $query->when($filters['username'] ?? false, fn ($query, $username) =>
        $query
            ->whereHas('user', fn ($query) =>
            $query->where('username', $username)));
    }

    public function getFullUrlAttribute()
    {
        return url('posts/' . $this->slug);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'model');
    }

}
