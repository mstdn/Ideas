<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;
use Livewire\WithFileUploads;

class CreateIdea extends Component
{
    use WithFileUploads;

    public $title;
    public $category = 1;
    public $description;
    public $images;

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',
        'description' => 'required|min:4',
    ];

    public function createIdea()
    {
        if (auth()->check()) {
            $this->validate();

            Idea::create([
                'user_id' => auth()->id(),
                'category_id' => $this->category,
                'status_id' => 1,
                'title' => $this->title,
                'description' => $this->description,
            ]);

            // session()->flash('success_message', 'Idea was added successfully.');

            session()->flash('success_message', 'Idea was added successfully!');

            $this->reset();

            return redirect()->route('idea.index');
        }

        abort(Response::HTTP_FORBIDDEN);
    }

    public function render()
    {
        return view('livewire.create-idea');
    }
}
