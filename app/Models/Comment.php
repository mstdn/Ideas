<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Mews\Purifier\Casts\CleanHtml;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $casts = [
        'content'            => CleanHtml::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
