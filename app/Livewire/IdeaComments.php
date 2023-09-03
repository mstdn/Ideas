<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;

    public $idea;

    protected $listeners = ['commentWasAdded'];

    public function commentWasAdded(): void
    {
        $this->idea->refresh();
        $this->goToPage($this->idea->comments()->paginate()->lastPage());
    }

    public function mount(Idea $idea): void
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.idea-comments', [
            'comments'          =>
                Comment::with('user')
                    ->where('model_type', Idea::class)
                ->where('model_id', $this->idea->id)
                ->paginate()
                ->withQueryString(),
            // 'comments' => $this->idea->comments,
        ]);
    }
}
