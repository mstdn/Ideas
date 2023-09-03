<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Mews\Purifier\Casts\CleanHtml;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\VoteNotFoundException;
use App\Exceptions\DuplicateVoteException;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory, Sluggable;

    protected $casts = [
        'description'        => CleanHtml::class,
    ];

    // const PAGINATION_COUNT = 10;
    protected $perPage = 10;

    protected $guarded = [];
    protected $with = ['comments'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function isVotedByUser(?User $user)
    {
        if (!$user) {
            return false;
        }

        return Vote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->exists();
    }

    public function vote(User $user)
    {
        if ($this->isVotedByUser($user)) {
            throw new DuplicateVoteException;
        }

        Vote::create([
            'idea_id' => $this->id,
            'user_id' => $user->id,
        ]);
    }

    public function removeVote(User $user)
    {
        $voteToDelete = Vote::where('idea_id', $this->id)
            ->where('user_id', $user->id)
            ->first();

        if ($voteToDelete) {
            $voteToDelete->delete();
        } else {
            throw new VoteNotFoundException;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function votes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'votes');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'model');
    }
}
